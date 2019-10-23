<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('email')) 
		{
				redirect('dashboard');
		}

		// Proccess the Login Form
		if ($this->form_validation->run('login') == FALSE)
		{
			$data['title'] = 'Login';
			$data['content'] = $this->load->view('public/auth-login', $data, TRUE);

			$this->load->view('layout/auth', $data);
		}
		else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		$email 		= $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($user) // If user is exist
		{
			if ($user['is_active'] == 1)
			{
				if (password_verify($password, $user['password']))
				{
					$data = [
						'email'		=> $user['email'],
						'role_id'	=> $user['role_id']
					];
					$this->session->set_userdata($data);

					redirect('dashboard');
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not activated yet!</div>');
				redirect('auth');
			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}

	}
	
	public function register()
	{
		if ($this->session->userdata('email')) 
		{
				redirect('dashboard');
		}		

		// Process Registration Form
		if ($this->form_validation->run('register') == FALSE) // If form validation fails or hasn't been submitted 
		{
				$data['title'] = 'Ciblog Registration';
				$data['content'] = $this->load->view('public/auth-register', $data, TRUE);

				$this->load->view('layout/auth', $data);
		}
		else // IF form validation succeded
		{
				$this->load->model('user_model', 'user');
				$this->user->create_user();
				
				// $this->_sendEmail();

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please login.</div>');
				redirect('auth');
		}

	}

	private function _sendEmail()
	{
			$config = [
					'protocol'	=> 'smtp',
					'smtp_host'	=> 'ssl://smtp.gmail.com',
					'smtp_user'	=> 'blogniter@gmail.com',
					'smtp_pass'	=> '29Juli!99!',
					'smtp_port'	=> 465,
					'mailtype'	=> 'html',
					'charset'		=> 'utf-8',
					'newLine'		=> "\r\n",
			];
			
			$this->load->library('email', $config);
			$this->email->initialize($config);

			$this->email->from('blogniter@gmail.com', 'Blogniter');
			$this->email->to('jalurumekso@gmail.com');
			$this->email->subject('Test Email');
			$this->email->message('Hai Jalu, this email is sent from your Blogniter.');

			$this->email->send();
			
			if($this->email->send()) 
			{
				return true;
			}
			else
			{
				echo $this->email->print_debugger();
			}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You have been logged out.</div>');
		redirect('auth');


	}

	public function blocked()
	{
			$data['title'] = 'Access Denied';
			$data['content'] = $this->load->view('public/blocked', $data, TRUE);

			$this->load->view('layout/auth', $data);
	}

}