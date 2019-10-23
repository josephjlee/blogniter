<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('category_model', 'category');
        $this->load->model('dashboard_model', 'dashboard');
    }

  public function index($id = NULL)
    {
          
        $data['categories'] = $this->category->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);      
        $this->load->view('templates/footer');
    }

    public function create()
    {
        is_logged_in();
      
        if($this->form_validation->run('categories_form') == FALSE)
        {
            
            $data['title'] = 'Add New Category';

            // Content
            $data['form_action']  = 'categories/create';
            $data['content'] = $this->load->view('dashboard/editor-1', $data, TRUE);
            
            // Custom Scripts
            $data['custom_scripts'] = ['ckeditor', 'content-editor'];

            $this->load->view('layout/dashboard', $data);
        }
        else
        {          
            $this->category->create_category();
        }    
    }

    
    public function admin()
    {
        is_logged_in();

        // Title
        $data['title'] = 'All Categories';

        // Content
        $data['categories'] = $this->category->get_categories();
        $data['table_headings'] = ['Name', 'Slug', 'Description'];
        $data['content'] = $this->load->view('dashboard/datatable', $data, TRUE);

        // Scripts
        $data['custom_scripts'] = ['jquery.dataTables.min', 'dataTables.bootstrap4.min', 'datatables-categories', 'sweetalert2.all.min', 'sweetalert-success'];
        
        // Render
        $this->load->view('layout/dashboard', $data);
    }
    
    public function update($id = NULL)
    {     
        is_logged_in();

        if($this->form_validation->run('categories_form') == FALSE)
        {
            // Title
            $data['title'] = 'Edit Category';  

            // Content
            $data['category']   = $this->category->get_category_by_id($id);
            $data['categories'] = $this->category->get_categories();
            $data['form_action']  = 'categories/update';
            $data['hidden_value'] = ['id' => $data['category']['id']];
            $data['content'] = $this->load->view('dashboard/editor-1', $data, TRUE);

            // Custom Script
            $data['custom_scripts'] = ['ckeditor', 'content-editor'];

            // Render
            $this->load->view('layout/dashboard', $data);
        }
        else
        {
            $this->category->update_category();
        }
        
    }

    public function delete($id)
    {
        is_logged_in();
        
        $this->category->delete_category($id);
    } 

}