<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function get_users()
  {
	  $this->db->select('name');
	  $this->db->order_by('name', 'ASC');
	  $query = $this->db->get('users');
	  
	  return $query->result_array();
	}

	public function get_user_by_id($id)
	{	
		$this->db->select('users.id, name, email, image, role_id');	
		$this->db->join('user_role', 'user_role.id = users.role_id');
		$query = $this->db->get_where('users', ['users.id' => $id]);
		return $query->row_array();
	}
	
	public function count_all_user()
	{
			$query = $this->db->count_all('users');
			return $query;
	}

	public function get_user_roles()
  {
	  $query = $this->db->get('user_role'); 
	  return $query->result_array();
	}


	public function create_user()
	{
		$data = [
			'name' 			=> htmlspecialchars($this->input->post('name', TRUE)),
			'email' 		=> htmlspecialchars($this->input->post('email', TRUE)),
			'image' 		=> 'default.png',
			'password' 	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id'		=> intval($this->input->post('role')) ?? 2,
			'is_active'	=> 1
		];
		$this->db->insert('users', $data);
		
		$flashdata = [
			'message'	=> 'Created',
			'form-name'	=> 'User'
		];
		$this->session->set_flashdata($flashdata);
    redirect('users/admin');
	}

	public function delete($id)
	{
			$this->db->delete('users', array('id' => $id));

			$flashdata = [
				'message' => 'Deleted',
				'form-name' => 'User'
			];
			$this->session->set_flashdata($flashdata);
			redirect('users/admin');
	}

	public function update($data, $email)
	{
		$this->db->update('users', $data, ['email' => $email]);

		$flashdata = [
			'message'	=> 'Updated',
			'form-name'	=> 'User'
		];
		$this->session->set_flashdata($flashdata);
    redirect('users/admin');
	}

}