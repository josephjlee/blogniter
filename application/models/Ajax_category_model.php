<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_category_model extends CI_Model {

  	public function select_category_data()
	{
        $sql = "SELECT * FROM `categories` ";
        
		return $sql;
	}

	public function is_searching_dt()
	{
		$search = $this->input->post('search')['value'];
		// $search = 'jalu';

		$sql = '';

		// If user performs searching data, include 'like/or_like' clause
		if ( !empty($search) )
		{   
			$sql .= "WHERE `name` LIKE '%" . $search . "%' ESCAPE '!' ";
			$sql .= "OR `slug` LIKE '%" . $search . "%' ESCAPE '!' ";
			$sql .= "OR `description` LIKE '%" . $search . "%' ESCAPE '!' ";
		}

		return $sql;  
	}

	public function is_ordering_dt()
    {
		$columns = [
            0 => 'name',
            1 => 'slug',
            2 => 'description'
        ]; 
        
        $order  = $this->input->post('order');

        // $sql = "ORDER BY `" . $columns[1] . "` ASC ";

        $sql = '';

        // If user performs ordering, include 'order_by' clause
        if ( !empty($order) )
        {
            $sql = "ORDER BY `" . $columns[$order[0]['column']] . "` " . strtoupper($order[0]['dir']) . " ";
        }

        return $sql;
	}

	public function is_limiting_dt()
    {
        $limit  = $this->input->post('length');
        $start  = $this->input->post('start');
        
        $sql = '';

        if ( $limit != -1 )
        {
            $sql .= "LIMIT " . $start . ', ' . $limit;
        }

        return $sql;
	}
	
	public function get_datatable()
    {
        $sql = $this->select_category_data();
        $sql .= $this->is_searching_dt();
        $sql .= $this->is_ordering_dt();
        $sql .= $this->is_limiting_dt();
        
        $query = $this->db->query($sql); 
        return $query->result_array(); 

        // return $sql;
	}
	
	public function count_all_dt()
    {
        $sql = $this->select_category_data();

        $query = $this->db->query($sql);        
        return $query->num_rows();
    }

    public function count_filtered_dt()
    {
        $sql = $this->select_category_data();
        $sql .= $this->is_searching_dt();

        $query = $this->db->query($sql);        
        return $query->num_rows();
    }

}