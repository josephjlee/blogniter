<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

 public function get_access_menu()
 {
    $data = [
      'role_id'  => $this->input->post('roleId'),
      'menu_id' => $this->input->post('menuId')
    ];

    $query = $this->db->get_where('user_access_menu', $data);
    
    if ($query->num_rows() < 1)
    {
        $this->db->insert('user_access_menu', $data);
    }
    else
    {
        $this->db->delete('user_access_menu', $data);
    }

 }


}