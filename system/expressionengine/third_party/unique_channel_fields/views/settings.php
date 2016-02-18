<style>
.mainTable.padTable td h3 {
	margin: 10px 0;
}
.field_selects p {
	margin: 3px 0 !important;
	padding: 7px;
    border: 3px solid #ccc;
    border-radius: 8px;
    background: #ffffff;
}
.field_add p {
	margin: 8px 0 !important;
}
.field_selects select, .field_add select {
	padding: 4px;
    border-radius: 3px;
	border: 1px solid #A9A9A9;
}
.field_selects .or {
	margin: 8px;
	font-size: 16px;
	color: #cc0000;
	display: block;
}
.field_selects .and {
	color: #92a57c;
	display: inline-block;
	margin: 0 5px;
}
table.mainTable td.add_row {
	border-top: 5px solid #2A3940;
}

.field_selects .add_select {
	display: inline-block;
	border: 1px solid #ccc;
	padding-right: 27px;
	height: 25px;
	vertical-align: top;
	border-radius: 5px;
	margin: 0;
	cursor: pointer;
	
	background: #dbe6c4 no-repeat center center;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAV0lEQVQ4T2NkwA1OMjAwmEGlQWwLbEoZ8RjwH00Oq9pRAxgYQGGAHNp4whSr1EmQAeihTZIhVDHgBAMDgzlJ1iIUHxtNB5B0gAtQnJmQY+cYAwODNTabAD32E5zWDeheAAAAAElFTkSuQmCC);
	background-image: 
		url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAV0lEQVQ4T2NkwA1OMjAwmEGlQWwLbEoZ8RjwH00Oq9pRAxgYQGGAHNp4whSr1EmQAeihTZIhVDHgBAMDgzlJ1iIUHxtNB5B0gAtQnJmQY+cYAwODNTabAD32E5zWDeheAAAAAElFTkSuQmCC), 
		linear-gradient(to bottom, #dbe6c4 5%, #9ba892 100%);
	
	-moz-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	-webkit-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	box-shadow:inset 0px 0px 14px -3px #f2fadc;
}
.field_selects .add_select:hover {
	background-color: #9ba892;
	background-image: 
		url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAV0lEQVQ4T2NkwA1OMjAwmEGlQWwLbEoZ8RjwH00Oq9pRAxgYQGGAHNp4whSr1EmQAeihTZIhVDHgBAMDgzlJ1iIUHxtNB5B0gAtQnJmQY+cYAwODNTabAD32E5zWDeheAAAAAElFTkSuQmCC),
		linear-gradient(to bottom, #9ba892 5%, #dbe6c4 100%);
}
.field_selects .add_select select {
	display: none;
}

.remove_row {
	overlow: hidden;
	text-indent: -999em;
	display: inline-block;
	border: 1px solid #ccc;
	width: 25px;
	height: 25px;
	vertical-align: middle;
	text-align: center;
	border-radius: 5px;
	margin: 10px;
	padding: 0;
	cursor: pointer;
	color: #fff;
	
	background: #fc8d83 no-repeat center center;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABI0lEQVQ4T4XTyypHURTH8c+fMHB5F0mRwsy/XIvM/mUgb2UiE0aSS8q1lLdQXkIGQqvOZp/dPjl16uy11++7rqfn7+k1n9+ZrfbZ8kuHUZxgCut474BM4gpv2MNnAOI9w0YjesBaBRLiayw0fscYhHgI91jKosY5z6QUh2tksppKmMAlFjPIXZPVcBE5XG6whY8ECGMN8oLoz0wG/hWHLQd0QfJ+tsQ1QIJED2aLSTyhH2nn9jKDuItRPmK6ADxjpZxOCQhxpDnXsQe32MwhOaAmjkzGMJ8BW5AEqIljztuIMV5guQZJixT15VGSODVsvNmTfNmi1H5a5VPsNBFKcQockLhLy3aI/VTCCI4QTrvlqLLUY9nO8YoDfNXG+M/f3L7+AV1MPhFGeThDAAAAAElFTkSuQmCC);
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABI0lEQVQ4T4XTyypHURTH8c+fMHB5F0mRwsy/XIvM/mUgb2UiE0aSS8q1lLdQXkIGQqvOZp/dPjl16uy11++7rqfn7+k1n9+ZrfbZ8kuHUZxgCut474BM4gpv2MNnAOI9w0YjesBaBRLiayw0fscYhHgI91jKosY5z6QUh2tksppKmMAlFjPIXZPVcBE5XG6whY8ECGMN8oLoz0wG/hWHLQd0QfJ+tsQ1QIJED2aLSTyhH2nn9jKDuItRPmK6ADxjpZxOCQhxpDnXsQe32MwhOaAmjkzGMJ8BW5AEqIljztuIMV5guQZJixT15VGSODVsvNmTfNmi1H5a5VPsNBFKcQockLhLy3aI/VTCCI4QTrvlqLLUY9nO8YoDfNXG+M/f3L7+AV1MPhFGeThDAAAAAElFTkSuQmCC),
		linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);

	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	
}	
.remove_row:hover {	
	background-color: #dfdfdf;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABI0lEQVQ4T4XTyypHURTH8c+fMHB5F0mRwsy/XIvM/mUgb2UiE0aSS8q1lLdQXkIGQqvOZp/dPjl16uy11++7rqfn7+k1n9+ZrfbZ8kuHUZxgCut474BM4gpv2MNnAOI9w0YjesBaBRLiayw0fscYhHgI91jKosY5z6QUh2tksppKmMAlFjPIXZPVcBE5XG6whY8ECGMN8oLoz0wG/hWHLQd0QfJ+tsQ1QIJED2aLSTyhH2nn9jKDuItRPmK6ADxjpZxOCQhxpDnXsQe32MwhOaAmjkzGMJ8BW5AEqIljztuIMV5guQZJixT15VGSODVsvNmTfNmi1H5a5VPsNBFKcQockLhLy3aI/VTCCI4QTrvlqLLUY9nO8YoDfNXG+M/f3L7+AV1MPhFGeThDAAAAAElFTkSuQmCC), 
		linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
}


.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
	background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#777777;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed));
	background:-moz-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-webkit-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-o-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-ms-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed',GradientType=0);
	background-color:#dfdfdf;
}
.myButton:active {
	position:relative;
	top:1px;
}


</style>

<script>
$( document ).ready(function() {
	$('select[name="add[channel]"]').on('change', function() {
		var label = $(this).find('option:selected').text();
		if (label) {
			$('select[name="add[fields][]"] optgroup').each(function() {
				if ($(this).attr('label') == label) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		}
		
	});
	
	$('.add_select').on('click', function() {
		$(this).removeClass('add_select');
	});
	
	$('.remove_row').on('click', function() {
		$(this).closest('tr').remove();
	});
});
</script>


<?=form_open('C=addons_extensions'.AMP.'M=save_extension_settings'.AMP.'file='.$class_name);?>

<?php

echo '<h3>'.lang('unique_channel_fields_description').'</h3>';

$cp_pad_table_template['cell_start'] = '<td valign="top">';
$cp_pad_table_template['cell_alt_start'] = '<td valign="top">';

$this->table->set_template($cp_pad_table_template);
$this->table->set_heading(
    array('data' => lang('channels'), 'style' => 'width:25%;'),
    array('data' => lang('fields')),
	array('data' => lang('remove'), 'style' => 'width:5%;')
);


$this->table->add_row(
	lang('select_channels'),
	lang('select_fields'),
	''
);

if (isset($current['fields']))
{
	foreach ($current['fields'] as $channel_id => $channel_data)
	{
		$field_selects = '';
		
		if (is_array($channel_data))
		{
			foreach ($channel_data as $key => $field_array)
			{
				$field_selects .= '<p>';
				foreach ($field_array as $val => $field_id)
				{
					$field_selects .= '<label>'.form_dropdown('fields['.$channel_id.']['.$key.'][]', array('' => ' -- Select -- ')+$fields[$channel_id], $field_id).'</label> <span class="and">AND</span> ';
				}
				$field_selects .= '<label class="add_select">'.form_dropdown('fields['.$channel_id.']['.$key.'][]', array('' => ' -- Select -- ')+$fields[$channel_id]).'</label>';
				$field_selects .= '</p> <div class="or">OR</div> ';
			}
			$field_selects .= '<p><label class="add_select">'.form_dropdown('fields['.$channel_id.']['.($key+1).'][]', array('' => ' -- Select -- ')+$fields[$channel_id]).'</label></p>';
		}
		
		$this->table->add_row(
			//'<p><label>'.form_dropdown('channels['.$channel_id.']', $channels, $channel_id).'</label></p>',
			'<h3>'.$channels[$channel_id].'</h3>',
			'<div class="field_selects">'.$field_selects.'</div>',
			'<a class="remove_row"> - </a>'
		);

	}

}
elseif (isset($current['channels']))
{
	
	$channel_id = $current['channels'];
	
	$field_selects .= '<label>'.form_dropdown('fields['.$channel_id.'][][]', array('' => ' -- Select -- ')+$fields[$channel_id], $field_id).'</label>';
		
	$this->table->add_row(
		'<p><label>'.form_dropdown('channels['.$channel_id.']', $channels, $channel_id).'</label></p>',
		'<div class="field_selects">'.$field_selects.'</div>',
		''
	);
}

$this->table->add_row(
	array(
		'data' => '<div class="field_add"><p><label>'.lang('add_channel').'<br>'.form_dropdown('add[channel]', $channels, '').'</label></p></div>',
		'class' => 'add_row'
	),
	array(
		'data' => '<div class="field_add"><p><label>'.lang('channel_fields').'<br>'.form_dropdown('add[fields][]', $field_titles, '').'</label><label></p></div>',
		'class' => 'add_row'
	),
	array(
		'data' => '',
		'class' => 'add_row'
	)
);

echo $this->table->generate();


echo '<h3>'.lang('preferences').'</h3>';

$this->table->set_heading(array('data' => lang('settings'), 'style' => 'width:25%;'), lang('preference'));

$this->table->add_row(
	'<h4>'.lang('show_confirm').'</h4>'.lang('show_confirm_description'),
	'<label>'.form_radio('settings[show_confirm]', 'y', ($show_confirm == 'y' ? TRUE : FALSE)).' Yes</label> &nbsp; '.
	'<label>'.form_radio('settings[show_confirm]', 'n', ($show_confirm != 'y' ? TRUE : FALSE)).' No</label>'
);

echo $this->table->generate();


?>

<p><?=form_submit('submit', lang('submit'), 'class="submit"')?></p>
<?php $this->table->clear()?>
<?=form_close()?>
<?php
/* End of file index.php */
/* Location: ./system/expressionengine/third_party/unique_channel_fields/views/index.php */