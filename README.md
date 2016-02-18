Unique Channel Fields
=====================

ExpressionEngine 2 Addon

Check for duplicate entry fields within selected channels
---------------------------------------------------------

This addon enables you to identify which fields are duplicates across channel entries. 

This is useful for when you require each field (or group of fields) to be unique, such as SKU's within products, helping to prevent duplicate products when adding new ones.


Use:
----

Select a Channel and a Field you would like to make unique acrros the chosen channel.

After saving you have the option to add additional fields and group them to validate together, or validate them separately.

** Grouping with AND: **

This would validate the field together.
An example would be grouping Supplier and SKU together where the two fields would be validated together. So if both values wihtin this field appear in another entry of the same channel, this would produce an error.

** Grouping with OR: **

This would validate the fields separately.


Limitations:
------------

This only validates basic fields containing text including text fields, checkboxes and other input type fields. The only exception is single relationships which this supports.
