<?php
// Extend Base_model instead of CI_model
class Banner_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('bnr_id', 'bnr_image', 'bnr_image_thumb');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('banner', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.



}