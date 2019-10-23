<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

  public function update($data, $email)
	{
    $this->db->update('users', $data, ['email' => $email]);
    
    $flashdata = [
      'message' => 'Updated',
      'form-name' => 'Profile',
    ];
    $this->session->set_flashdata($flashdata);
    redirect('account/edit_profile');
  }

  public function change_password($data, $email)
	{
    $this->db->set('password', $data);
    $this->db->where('email', $email);
		$this->db->update('users');
    
    $flashdata = [
      'message' => 'Updated',
      'form-name' => 'Password',
    ];
    $this->session->set_flashdata($flashdata);
    redirect('account/change_password');
  }
  
}