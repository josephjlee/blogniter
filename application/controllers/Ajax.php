<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function fetch_post_datatable()
	{
		
		// Required Model
		$this->load->model('dashboard_model', 'dashboard');
		$this->load->model('ajax_post_model', 'post_ajax');
		
		$draw = $this->input->post('draw');
		$totalData = $this->post_ajax->count_all_dt();
		$totalFiltered = $this->post_ajax->count_filtered_dt();					
		$data = [];

		$posts = $this->post_ajax->get_datatable();
		// print_r($posts);
		// die;

		if (!empty($posts))
		{
			foreach ($posts as $post)
			{
				$data[] = [
					$post['title'],
					$post['post_category'],
					$post['post_author'],
					date('d-m-Y', strtotime($post['created_at'])),
					'<div class="d-flex justify-content-around"><a href="' . base_url('posts/update/') . $post['id'] . '" class="btn btn-info btn-circle btn-sm"><i class="fas fa-pen"></i></a><a href="' .base_url('posts/delete/') . $post['id'] . '" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></div>'
				];
			}
		}

		$json_data = [
			"draw"            => intval($draw),  
			"recordsTotal"    => intval($totalData),  
			"recordsFiltered" => intval($totalFiltered), 
			"data"            => $data   
		];

		header("Content-type: application/json");
		echo json_encode($json_data); 
		
	}

	public function fetch_user_datatable()
	{		
		// Required Model
		$this->load->model('ajax_user_model', 'user_ajax');
		
		$draw = $this->input->post('draw');
		$totalData = $this->user_ajax->count_all_dt();
		$totalFiltered = $this->user_ajax->count_filtered_dt();					
		$data = [];

		$users = $this->user_ajax->get_datatable();
		// print_r($posts);
		// die;

		if (!empty($users))
    {
      foreach ($users as $user)
      {
          $data[] = [
            $user['name'],
            $user['email'],
            $user['role'],
            $user['is_active'],
            '<div class="d-flex justify-content-around"><a href="' . base_url('users/update/') . $user['id'] . '" class="btn btn-info btn-circle btn-sm"' . $user['id']. '"><i class="fas fa-pen"></i></a><a data-href="' . base_url('users/delete/') . $user['id'] . '" href="" class="btn btn-danger btn-circle btn-sm btn-delete"><i class="fas fa-trash"></i></a></div>'
          ];
      }
    }

		$json_data = [
			"draw"            => intval($draw),  
			"recordsTotal"    => intval($totalData),  
			"recordsFiltered" => intval($totalFiltered), 
			"data"            => $data   
		];

		header("Content-type: application/json");
		echo json_encode($json_data); 
		
	}
	
	public function fetch_category_datatable()
	{		
		// Required Model
		$this->load->model('ajax_category_model', 'category_ajax');
		
		$draw = $this->input->post('draw');
		$totalData = $this->category_ajax->count_all_dt();
		$totalFiltered = $this->category_ajax->count_filtered_dt();					
		$data = [];

		$categories = $this->category_ajax->get_datatable();
		// print_r($posts);
		// die;

		if (!empty($categories))
    {
      foreach ($categories as $category)
			{
					$data[] = [
							$category['name'],
							$category['slug'],
							word_limiter($category['description'], 8),
							'<div class="d-flex justify-content-around"><a href="update/' . $category['id'] . '" class="btn btn-info btn-circle btn-sm"><i class="fas fa-pen"></i></a><a href="" data-href="delete/' . $category['id'] . '" class="btn btn-danger btn-circle btn-sm btn-delete"><i class="fas fa-trash"></i></a></div>'

					];
			}
    }

		$json_data = [
			"draw"            => intval($draw),  
			"recordsTotal"    => intval($totalData),  
			"recordsFiltered" => intval($totalFiltered), 
			"data"            => $data   
		];

		header("Content-type: application/json");
		echo json_encode($json_data); 
		
	}
}