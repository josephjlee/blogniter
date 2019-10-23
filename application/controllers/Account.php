<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

  public function __construct()
  {
      parent::__construct();

      is_logged_in();

      $this->load->model('user_model', 'user');
      $this->load->model('account_model', 'account');
      $this->load->model('dashboard_model', 'dashboard');
  }

  public function index()
  {
        $email = $this->session->userdata('email');
        
        $data['title']   = 'My Account';
        $data['user']    = $this->dashboard->get_user_by_email($email);
        $data['content'] = $this->load->view('dashboard/account', $data, TRUE);

        $this->load->view('layout/dashboard', $data);
  }

  public function edit_profile()
  {      

      if ($this->form_validation->run('edit_profile') == FALSE)
      {
          $data['title'] = 'Edit Profile';
        
          $email = $this->session->userdata('email');
          $data['user_detail'] = $this->dashboard->get_user_by_email($email);
          $data['form_action'] = 'account/edit_profile';
          $data['content'] = $this->load->view('dashboard/user-edit', $data, TRUE);
          $data['custom_scripts'] = ['sweetalert2.all.min', 'sweetalert-success'];
          
          $this->load->view('layout/dashboard', $data);
      }
      else 
      {
          $email_update = $this->input->post('email');
          $data_update  = ['name' => $this->input->post('name')];
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

          $this->account->update($data_update, $email_update);

        }
  }

  public function change_password()
  {
    
      if ($this->form_validation->run('change_password') == FALSE)
      {
          $email = $this->session->userdata('email');
          $data['title']   = 'Change Password';
          $data['roles']   = $this->user->get_user_roles();
          $data['user']    = $this->dashboard->get_user_by_email($email);
          $data['content'] = $this->load->view('dashboard/change_password', $data, TRUE);
          $data['custom_scripts'] = ['sweetalert2.all.min', 'sweetalert-success'];
          $this->load->view('layout/dashboard', $data);
      }
      else 
      {          
          // check if current password matches database
          $cur_password = $this->input->post('current-password');
          $new_password = $this->input->post('new-password-1');

          if (!password_verify($cur_password, $data['user']['password']))
          {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');;
              redirect('account/change_password');
          }
          else
          {
              if ($new_password == $cur_password)
              {
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as the current password.</div>');
                  redirect('account/change_password');
              }
              else
              {
                  $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                  $this->account->change_password($password_hash, $email);                
              }
          }
        }
  }

}