<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('post_model', 'post');
        $this->load->model('category_model', 'category');
        $this->load->model('dashboard_model', 'dashboard');

    }

    public function index()
    {
        $data['posts'] = $this->post->get_all_posts();
        $data['content'] = $this->load->view('public/post-index', $data, TRUE);     

        $this->load->view('layout/public', $data);
    }

    public function view($id = '')
    {

        $data['post'] = $this->post->get_post_by_id($id);
        $data['content'] = $this->load->view('public/post-single', $data, TRUE);     

        $this->load->view('layout/public', $data);
    }

    public function create()
    {
      is_logged_in();
      
      if($this->form_validation->run('post_form') == FALSE)
      {         
          $data['title'] = 'Add New Post';         
          $data['categories'] = $this->category->get_categories();
          $data['form_action'] = 'posts/create/';
          $data['content'] = $this->load->view('dashboard/editor-2', $data, TRUE);
          $data['custom_scripts'] = ['ckeditor', 'content-editor'];

          $this->load->view('layout/dashboard', $data);
      }
      else
      {
          // Upload Image
          $config['upload_path'] = './assets/images';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = '2048';
          $config['max_width'] = '2000';
          $config['max_height'] = '2000';

          $this->load->library('upload', $config);
          if(!$this->upload->do_upload('userfile'))
          {
              $errors = array('error' => $this->upload->display_errors());
          } 
          else 
          {
              $data = array('upload_data' => $this->upload->data());
          }
          
          $this->post->create_post();
      }  

    }

    public function admin()
    {  
        is_logged_in();

        // Title
        $data['title'] = 'All Posts';

        // Content
        // The actual content is served by Ajax Controller
        $data['table_headings'] = ['Title', 'Category', 'Author', 'Created'];

        // The content of datatable is served by fetch_post_ajax()
        $data['content'] = $this->load->view('dashboard/datatable', $data, TRUE); 

        // Custom Scripts
        $data['custom_scripts'] = ['jquery.dataTables.min', 'dataTables.bootstrap4.min', 'datatables-post', 'sweetalert2.all.min', 'sweetalert-success'];

        // Render
        $this->load->view('layout/dashboard', $data);
    }

    public function update($id = NULL)
    {
        is_logged_in();
        has_post_access();

        if($this->form_validation->run('post_form') == FALSE)
        {
            // Title - Title must match with 'title' column in User Menu Table
            $data['title'] = 'Edit Post'; 

            // Content
            $data['post']  = $this->post->get_post_by_id($id);
            $data['categories'] = $this->category->get_categories();
            $data['form_action'] = 'posts/update/';
            $data['form_hidden'] = ['id' => $data['post']['id'], 'user_id' => $data['post']['user_id']];
            $data['content'] = $this->load->view('dashboard/editor-2', $data, TRUE);

            // Custom Scripts
            $data['custom_scripts'] = ['ckeditor', 'content-editor'];

            // Render
            $this->load->view('layout/dashboard', $data);
        }
        else
        {
          // // Upload Image
          // $config['upload_path'] = './assets/images';
          // $config['allowed_types'] = 'gif|jpg|png';
          // $config['max_size'] = '2048';
          // $config['max_width'] = '2000';
          // $config['max_height'] = '2000';

          // $this->load->library('upload', $config);

          // if(!$this->upload->do_upload('userfile')){
          //   $errors = array('error' => $this->upload->display_errors());
          // } else {
          //   $data = array('upload_data' => $this->upload->data());
          // }
          
          $this->post->update_post();
        }
        
    }

    public function delete($id)
    {
        is_logged_in();
        has_post_access();
        
        $this->post->delete_post($id);
    }

    public function fetch_posts_ajax()
    {
        $columns = [
          0 => 'title', 
          1 => 'post_category',
          2 => 'post_author',
          3 => 'created_at',
        ];

        $search = $this->input->post('search')['value'];
        $order  = $this->input->post('order');
        $limit  = $this->input->post('length');
        $start  = $this->input->post('start');
     
        if (empty($order))
        {
            $order_col  = 'created_at';
            $order_dir  = 'desc'; 
        }
        else
        {
            $order_col = $columns[$order[0]['column']];
            $order_dir = $order[0]['dir'];
        }
        
        if (empty($search))
        {              
            $posts = $this->post->get_datatable($order_col, $order_dir, $limit, $start);
        }
        else 
        {
            $posts = $this->post->search_datatable($search, $order_col, $order_dir, $limit, $start);
        }

        $draw           = $this->input->post('draw');
        $totalData      = $this->post->count_datatable();
        $totalFiltered  = $this->post->count_datatable_search($search);
        $data = [];

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

    
}