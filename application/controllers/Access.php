<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

  public function __construct()
  {
      parent::__construct();

      is_logged_in();

      $this->load->model('role_model', 'role');
      $this->load->model('dashboard_model', 'dashboard');
  }

  public function index()
  {
      $data['title'] = 'All Roles';
      $data['roles'] = $this->db->get_where('user_role', ['id<' => 3])->result_array();
      $data['content'] = $this->load->view('dashboard/access-index', $data, TRUE);
      
      $this->load->view('layout/dashboard', $data);
  }

  public function manage($roleid)
  {

      $data['role'] = $this->db->get_where('user_role', ['id' => $roleid])->row_array();
      $data['title'] = 'Manage ' . $data['role']['role'] . ' Access';
      $data['user_menus'] = $this->db->get_where('user_menu', ['id !=' => 1])->result_array();
      $data['content'] = $this->load->view('dashboard/access-manage', $data, TRUE);
      $data['custom_scripts'] = ['sweetalert2.all.min', 'sweetalert-success', 'change-access'];

      $this->load->view('layout/dashboard', $data);
  }

  public function change_access()
  {
      $this->role->get_access_menu();

      $flashdata = [
        'message' => 'Access changed!',
        'form-name' => 'Access',
      ];
      $this->session->set_flashdata($flashdata);      
  }

}