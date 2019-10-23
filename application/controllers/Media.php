<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

  	public function __construct()
	{
		parent::__construct();

		$this->load->model('media_model', 'media');
		$this->load->model('dashboard_model', 'dashboard');

	}

	public function index()
	{
		$data['title'] = 'All Images';
		$data['images'] = $this->media->get_all_images();
		$data['content'] = $this->load->view('dashboard/media-index', $data, TRUE);

		$data['custom_scripts'] = ['sweetalert2.all.min', 'sweetalert-success'];

		// Render
		$this->load->view('layout/dashboard', $data);
	}

	public function upload_image()
	{
			if ($this->form_validation->run('upload_image') == FALSE)
			{
					$data['title'] = 'Upload Image';

					$data['error'] = '';			
					$data['content'] = $this->load->view('dashboard/media-upload', $data, TRUE);

					$this->load->view('layout/dashboard', $data);
			}
			else 
			{
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/images/';

					$this->load->library('upload', $config);
					
					if ( !$this->upload->do_upload('image') )
					{
							$error = $this->upload->display_errors();

							$this->session->set_flashdata(
								'message', 
								'<div class="alert alert-danger" role="alert">' . $error . '</div>'
							);
              redirect('media/upload_image');
					}
					else
					{						
							$this->media->upload();
					}
			}
	}
	
	public function edit( $id = NULL )
	{
			if ($this->form_validation->run('upload_image') == FALSE)
			{
					$data['title'] = 'Edit Image Info';

					$data['image'] 	 = $this->media->get_image_by_id($id);
					$data['content'] = $this->load->view('dashboard/media-edit', $data, TRUE);

					$data['custom_scripts'] = ['sweetalert2.all.min', 'sweetalert-delete'];

					$this->load->view('layout/dashboard', $data);
			}
			else 
			{
					$this->media->update();
			}
	}

	public function delete( $id = NULL )
	{
			$this->media->delete($id);
	}

}