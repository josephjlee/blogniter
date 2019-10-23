<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends CI_Model {

  public function visitor_by_month()
  {
		$this->db->select('month, visitor');
	  $this->db->order_by('id', 'ASC');
	  $query = $this->db->get('visitors');
	  
	  return $query->result_array();
	}
	
	public function count_all_visitor()
	{
			$query = $this->db->query('
				SELECT SUM(visitor)
				FROM visitors
			');

			return $query->row_array();
	}

}