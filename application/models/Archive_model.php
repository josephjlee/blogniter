<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_model extends CI_Model {

  public function get_posts_by_user($id) 
  {
      $this->db->join('users', 'posts.user_id = users.id');
      $query = $this->db->get_where('posts', array('users.id' => $id));

      return $query->result_array();
  }

  public function get_user($id)
  {
      $query = $this->db->get_where('users', array('id' => $id));
      return $query->row_array();
  }

  public function get_posts_by_category($id)
  {
      $this->db->select('posts.id, posts.title, posts.slug, posts.body, posts.post_image, posts.created_at, posts.category_id, categories.name as post_category');
      $this->db->join('categories', 'posts.category_id = categories.id');
      $query = $this->db->get_where('posts', array('category_id' => $id));

      return $query->result_array();
  }

  public function get_category($id)
  {
      $this->db->select('name');
      $query = $this->db->get_where('categories', array('id' => $id));

        // echo '<pre>';
        //   print_r($query->row_array());
        // echo '</pre>';

      return $query->row_array();
  }


}