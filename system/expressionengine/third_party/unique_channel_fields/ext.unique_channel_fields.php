<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Unique Fields Extension
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Extension
 * @author		Simon Andersohn
 * @link		
 */
 
include_once PATH_THIRD.'unique_channel_fields/config.php';


class Unique_channel_fields_ext {
	
	public $settings 		= array();
	public $class_name		= UNIQUE_CHANNEL_FIELDS_CLASS_NAME;
	public $name			= UNIQUE_CHANNEL_FIELDS_NAME;
	public $version			= UNIQUE_CHANNEL_FIELDS_VERSION;
	public $description		= 'Checks if field value already exists within a channel while editing/updating entries';
	public $docs_url		= '';
	public $settings_exist	= 'y';
	
	private $EE;
	private $site_id		= 1;
	
	/**
	 * Constructor
	 *
	 * @param 	mixed	Settings array or empty string if none exist.
	 */
	public function __construct($settings = '')
	{
		
		$this->settings = $settings;
		
		$this->site_id = ee()->config->item('site_id');
		
		$this->_settings_url = BASE.AMP.'C=addons_extensions'.AMP.'M=extension_settings'.AMP.'file='.$this->class_name;
		
	}
	
	// ----------------------------------------------------------------------
	
	/**
	 * Settings Form
	 *
	 * @param   Array   Settings
	 * @return  void
	 */
	function settings_form($current)
	{

		ee()->cp->set_right_nav(array(
			'settings'	=> $this->_settings_url,
		));
	
		ee()->load->helper('form');
		ee()->load->library('table');
		
		ee()->cp->load_package_js('settings');
		ee()->cp->load_package_css('settings');

		$vars = array();

		// Channels
		$channels = array('' => ' -- Select -- ');
		
		$q = ee()->db
			->select('channel_id, channel_title')
			->where('site_id', $this->site_id)
			->order_by('channel_title')
			->get('channels');

		if($q->num_rows() > 0)
		{
			foreach($q->result() as $channel)
			{
				$channels[$channel->channel_id] = $channel->channel_title;
			}
		}
		
		// Fields
		$fields = array('' => ' -- Select -- ');
		$field_titles = array('' => ' -- Select -- ');
		
		$q = ee()->db
				->select('field_id, field_name, field_label, field_type, channel_id, channel_title')
				->where('channel_fields.site_id', $this->site_id)
				->join('channels', 'channel_fields.group_id = channels.field_group', 'inner')
				->order_by('channel_title, field_label', 'ASC')
				->get('channel_fields');
		
		if ($q->num_rows() > 0){
			foreach ($q->result() as $r){
				$fields[$r->channel_id][$r->field_id] = $r->field_label;
				$field_titles[$r->channel_title][$r->field_id] = $r->field_label;
			}
		}
		
		$q->free_result();
		
		$vars['class_name'] = $this->class_name;
		$vars['channels'] = $channels;
		$vars['fields'] = $fields;
		$vars['field_titles'] = $field_titles;
		$vars['current'] = $current;
		
		$vars['show_confirm'] = isset($current['settings']['show_confirm']) ? $current['settings']['show_confirm'] : 'y';

		return ee()->load->view('settings', $vars, TRUE);
	}

	


	/**
	 * Save Settings
	 *
	 * This function provides a little extra processing and validation
	 * than the generic settings form.
	 *
	 * @return void
	 */
	function save_settings()
	{
		if (empty($_POST))
		{
			show_error(lang('unauthorized_access'));
		}

		$settings = array();
		
		if (isset($_POST['fields']))
		{
			$settings['fields'] = $_POST['fields'];
		}
		if (isset($_POST['settings']))
		{
			$settings['settings'] = $_POST['settings'];
		}
		if (isset($_POST['add']['channel']) && !empty($_POST['add']['channel']) && ! isset($settings['fields'][$_POST['add']['channel']]))
		{
			$settings['fields'][$_POST['add']['channel']] = array($_POST['add']['fields']);
		}

		ee()->db->where('class', __CLASS__);
		ee()->db->update('extensions', array('settings' => serialize($this->_array_filter_recursive($settings))));

		ee()->session->set_flashdata(
			'message_success',
			lang('preferences_updated')
		);
		
		ee()->functions->redirect($this->_settings_url);
	}
	
	
	// ----------------------------------------------------------------------
	
	/**
	 * Activate Extension
	 *
	 * This function enters the extension into the exp_extensions table
	 *
	 * @see http://codeigniter.com/user_guide/database/index.html for
	 * more information on the db class.
	 *
	 * @return void
	 */
	public function activate_extension()
	{
		// Setup custom settings in this array.
		$this->settings = array();
		
		$data[] = array(
			'class'		=> __CLASS__,
			'method'	=> 'entry_submission_start',
			'hook'		=> 'entry_submission_start',
			'settings'	=> serialize($this->settings),
			'version'	=> $this->version,
			'enabled'	=> 'y'
		);	
		
		// insert in database
		foreach($data as $key => $data) {
			ee()->db->insert('exp_extensions', $data);
		}
	}	

	
	// ----------------------------------------------------------------------
	
	/**
	 * entry_submission_start
	 *
	 * @param 
	 * @return 
	 */
	function entry_submission_start($channel_id=0, $autosave=FALSE)
	{
		if ( ! $channel_id || $autosave === TRUE) return;
		if ( ! isset($this->settings['fields']) || empty($this->settings['fields'])) return;
		
		// If status is set to closed, do nothing
		$status = ee()->input->post('status');
		if ($status == 'closed') return;
		
		// Get duplicate field settings
		$field_ids = $this->settings['fields'];

		$entry_id = ee()->input->post('entry_id');
		
		if (isset($field_ids[$channel_id]) && !empty($field_ids[$channel_id]))
		{

			// Get field types
			$query = ee()->db->select('field_id, field_name, field_label, field_type')
					->from('channel_fields')
					->where('site_id', $this->site_id)
					->get();

			$results = $query->result_array();
			$query->free_result(); //free up memory


			// Put field_types into manageable array
			$channel_fields = array();
			foreach ($results as $result)
			{
				$channel_fields[$result['field_id']] = $result;
			}
			
			$duplicates = array();

			// Compare fields and find duplicates
			foreach ($field_ids[$channel_id] as $field_group)
			{
				
				$error_fields = array();

				foreach ($field_group as $field_id)
				{
					
					if (isset($channel_fields[$field_id]))
					{
						
						$col_name = 'field_id_'.$field_id;
						$col_value = ee()->input->post($col_name);
						
						$error_fields[$col_name] = $channel_fields[$field_id]['field_label'];

						if ($channel_fields[$field_id]['field_type'] == 'relationship' && is_array($col_value['data']))
						{
							foreach ($col_value['data'] as $child_id)
							{
								ee()->db->where('relationships.child_id', $child_id);
							}
							
							ee()->db->join('relationships', 'channel_data.entry_id = relationships.parent_id', 'inner');
							ee()->db->where('relationships.field_id', $field_id);
						}
						else
						{	
							ee()->db->where('channel_data.'.$col_name, $col_value);
							ee()->db->where('channel_data.'.$col_name.' !=', '');
						}

					}
					
				}
				
				$query = ee()->db
						//->select('channel_data.entry_id')
						->from('channel_data')
						->where('channel_data.channel_id', $channel_id)
						->where('channel_data.entry_id !=', $entry_id)
						->where('channel_data.site_id', $this->site_id)
						
						// status
						->join('channel_titles', 'channel_data.entry_id = channel_titles.entry_id', 'inner')
						->where('channel_titles.status !=', 'closed')
						
						->limit(1)
						->get()
						;
				
				if ( $query->num_rows() > 0 ) 
				{
					$error_labels = array();
					
					// Store duplicates
					foreach($error_fields as $field_name => $field_label)
					{
						$error_labels[] = $field_label;
					}
					
					foreach ($error_fields as $field_name => $field_label)
					{
						$duplicates[$field_name] = implode(', ', $error_labels);
					}

					// Load the unique_fields language file
					ee()->lang->loadfile($this->class_name);
					
					foreach($duplicates as $field_name => $field_label)
					{
						ee()->api_channel_entries->_set_error(lang('duplicate_found').': '. $field_label, $field_name);
					}
					
					ee()->javascript->output('$.ee_notice("'.ee()->lang->line('duplicate_found').'", {type : "error"})');
					
					if (isset($this->settings['settings']['show_confirm']) && $this->settings['settings']['show_confirm'] == 'y')
					{
						ee()->javascript->output('
							$(window).bind("beforeunload", function() {
								if (confirm) {
									return "'.lang('not_saved').'";
								}
							});
							$("form#publishForm").submit(function () {
								$(window).unbind("beforeunload");
							});
						');
					}
					
				}
			}
			
			$this->end_script = TRUE;
			
		}


	}

	
	private function _array_filter_recursive($input) 
	{ 
		foreach ($input as &$value) 
		{ 
			if (is_array($value)) 
			{ 
				$value = $this->_array_filter_recursive($value); 
			} 
		} 

		return array_filter($input); 
	} 


	// ----------------------------------------------------------------------

	/**
	 * Disable Extension
	 *
	 * This method removes information from the exp_extensions table
	 *
	 * @return void
	 */
	function disable_extension()
	{
		ee()->db->where('class', __CLASS__);
		ee()->db->delete('extensions');
	}

	// ----------------------------------------------------------------------

	/**
	 * Update Extension
	 *
	 * This function performs any necessary db updates when the extension
	 * page is visited
	 *
	 * @return 	mixed	void on update / false if none
	 */
	function update_extension($current = '')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}
		
		ee()->db->where('class', __CLASS__);
		ee()->db->update(
				'extensions', 
				array('version' => $this->version)
		);
	}	
	
	// ----------------------------------------------------------------------
}

/* End of file ext.unique_fields.php */
/* Location: /system/expressionengine/third_party/unique_channel_fields/ext.unique_channel_fields.php */