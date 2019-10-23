<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
      parent::__construct();

      is_logged_in();

      $this->load->model('user_model', 'user');
      $this->load->model('dashboard_model', 'dashboard');
  }

  public function admin()
  {
        // Title
        $data['title'] = 'All Users';

        // Content
        $data['table_headings'] = ['Name', 'Email', 'Role', 'Status'];
        $data['content'] = $this->load->view('dashboard/datatable', $data, TRUE);

        // Custom Script
        $data['custom_scripts'] = ['jquery.dataTables.min', 'dataTables.bootstrap4.min', 'datatables-users', 'sweetalert2.all.min', 'sweetalert-success'];

        // Render
        $this->load->view('layout/dashboard', $data);
  }

  public function create()
  {
      if ($this->form_validation->run('create_user') == FALSE)
      {
          $data['title'] = 'Add New User';
          $data['roles'] = $this->user->get_user_roles();
          $data['content'] = $this->load->view('dashboard/user-new', $data, TRUE);

          $this->load->view('layout/dashboard', $data);
      }
      else 
      {
          $this->user->create_user($data);
      }
  }

  public function update($id = NULL)
  {      

      $data['title'] = 'Edit Existing User';
      $data['roles'] = $this->user->get_user_roles();
      $data['user_detail'] = $this->user->get_user_by_id($id);
      $data['form_action'] = 'users/update';
      $data['content'] = $this->load->view('dashboard/user-edit', $data, TRUE);

      // print_debugger($data['user_detail']);

      if ($this->form_validation->run('update_user') == FALSE)
      {
          $this->load->view('layout/dashboard', $data);
      }
      else 
      {
          $email_update = $this->input->post('email');
          
          $data_update = [
            'name'     => $this->input->post('name'),
            'role_id'  => $this->input->post('role')
          ];

          $upload_image = $_FILES['image']['name'];

          if ($upload_image) 
          {
              $config['allowed_types'] = 'gif|jpg|png';
              $config['max_size']      = '2048';
              $config['upload_path']   = './assets/images/profile';

              $this->load->library('upload', $config);

              if ($this->upload->do_upload('image'))
              {
                  $old_image = $data['user']['image'];
                  if ($old_image != 'default.png')
                  {
                    unlink(FCPATH . 'assets/images/profile/' . $old_image);
                  }

                  $new_image = $this->upload->data('file_name');
                  $data_update['image'] = $new_image;
              }
              else
              {
                echo $this->upload->display_errors();
              }
          }

          $this->user->update($data_update, $email_update);

        }
  }

  public function delete($id)
  {
      $this->user->delete($id);
  }

}
