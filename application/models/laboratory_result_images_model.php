<?php
// Extend Base_model instead of CI_model
class Laboratory_result_images_model extends Base_model
{
    public function __construct()
    {
        // List all fields of the table.
        // Primary key must be auto-increment and must be listed here first.
        $fields = array('lri_id', 'lab_id', 'lri_image','lri_image_thumb','lri_image_original','lri_description','lri_date_created');
        // Call the parent constructor with the table name and fields as parameters.
        parent::__construct('laboratory_result_images', $fields);
    }

    public function get_all( $params = array(), $order_by = array('lri_date_created' => 'DESC', 'lri_id' => "DESC") )
    {               
        $this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id");        

        if ($order_by) 
        {   
            foreach ($order_by as $key => $value) 
            {
                $this->db->order_by($key, $value); 
            }
        }

        return parent::get_all($params);
    }

    public function get_all_in_lab_id($laboratory_result_ids = array(), $params = array(), $order_by = array('lri_date_created' => 'DESC', 'lri_id' => "DESC") )
    {               
        $this->db->select(
            "   laboratory_result_images.lri_id as lri_id, 
                laboratory_results.lab_id as lab_id, 
                laboratory_result_images.lri_image as lri_image,
                laboratory_result_images.lri_image_thumb as lri_image_thumb,
                laboratory_result_images.lri_image_original as lri_image_original,
                laboratory_result_images.lri_description as lri_description,
                laboratory_result_images.lri_date_created as lri_date_created,
                examination.exm_name as exm_name
            "
        );
        
        $this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id","left");       
        $this->db->join('examination', "examination.exm_id = laboratory_results.exm_id","left");   

        if ($laboratory_result_ids !== false) {
            $this->db->where_in("{$this->table}.lab_id",$laboratory_result_ids);
        }

        if ($order_by) 
        {   
            foreach ($order_by as $key => $value) 
            {
                $this->db->order_by($key, $value); 
            }
        }

        return parent::get_all($params);
    }

    public function get_one($id)
    {
        $this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id");   
        return parent::get_one($id);
    }

}