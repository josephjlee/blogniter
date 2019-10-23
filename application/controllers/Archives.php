<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Archives extends CI_Controller {

  public function __construct()
  {
      parent::__construct();

      $this->load->model('archive_model', 'archive');

  }

  public function category($id = '')
  {

      $data['archive_data'] = $this->archive->get_category($id);
      $data['posts'] = $this->archive->get_posts_by_category($id);
      $data['content'] = $this->load->view('public/post-archive', $data, TRUE);     

      $this->load->view('layout/public', $data);         
  }

  public function user($id = '')
  {
      

      $data['archive_data'] = $this->archive->get_user($id);
      $data['posts'] = $this->archive->get_posts_by_user($id); 
      $data['content'] = $this->load->view('public/post-archive', $data, TRUE);     

      $this->load->view('layout/public', $data);                  
  }
  
}