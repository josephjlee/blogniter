<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        is_logged_in();

        $this->load->model('post_model', 'post');
        $this->load->model('visitor_model', 'visitor');
        $this->load->model('category_model', 'category');
        $this->load->model('user_model', 'user');
        $this->load->model('dashboard_model', 'dashboard');
    }

  public function index()
  {

      $data['title'] = 'Dashboard';    

      $data['total_post'] = $this->post->count_all_posts();
      $data['total_category'] = $this->category->count_all_categories();
      $data['total_user'] = $this->user->count_all_user();
      $data['total_visitor'] = implode($this->visitor->count_all_visitor());
      $data['custom_scripts'] = ['Chart.min', 'dashboard-charts'];
      $data['content'] = $this->load->view('dashboard/index', $data, TRUE);

      // $role_id      = $this->session->userdata('role_id');
      // $menu_groups  = $this->dashboard->get_menu_groups($role_id);
      // $menus = $this->dashboard->get_menus($menu_groups[0]['id']);

      // print_debugger($menus);

      $this->load->view('layout/dashboard', $data);
  }

  public function send_visitor_data()
  {
      $data    = [];

      foreach ($this->visitor->visitor_by_month() as $per_month_visit)
      {
        $data['month'][]    = $per_month_visit['month'];
        $data['visitor'][]  = intval($per_month_visit['visitor']);
      }
  
      foreach ($this->post->count_posts_by_cat() as $post_per_category)
      {
        $data['category'][]    = $post_per_category['name'];
        $data['cat_count'][]   = $post_per_category['COUNT(name)'];
        $data['cat_color'][]   = $post_per_category['color'];
      }
        
      foreach ($this->post->count_posts_by_user() as $post_by_user)
      {
        $data['author'][]     = $post_by_user['name'];
        $data['post_count'][] = intval($post_by_user['COUNT(name)']);
      }
      
      // print_debugger($data);
      header("Content-type: application/json");
      echo json_encode($data);
  }

  public function blocked()
  {
    
  }

}