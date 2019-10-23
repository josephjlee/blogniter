<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  public function get_user_by_email($email)
	{
			$this->db->where('email',$email);
			$query = $this->db->get('users');
			
			return $query->row_array();
  }
  
  public function get_menu_groups($role_id)
  {
      $this->db->select('menu_group.id, menu_group.title, menu_group.icon');
      $this->db->join('user_access_menu', 'user_access_menu.menu_id = menu_group.id');
      $this->db->order_by('user_access_menu.menu_id', 'ASC');
      $this->db->where('user_access_menu.role_id', $role_id);
      $this->db->where('menu_group.title!=', 'dashboard');
      
      $query = $this->db->get('menu_group');
      return $query->result_array();			
  }
  
  public function get_menus($menu_group_id)
  {
      $this->db->select('user_menu.title, user_menu.url');
      $this->db->join('menu_group', 'menu_group.id = user_menu.menu_group_id');
      $this->db->where('user_menu.menu_group_id', $menu_group_id);
      
      $query = $this->db->get('user_menu');
      return $query->result_array();
  }
  
}