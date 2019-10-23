<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    public function select_posts_data()
    {
        
        $sql = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`slug`, `posts`.`body`, `posts`.`post_image`, `posts`.`created_at`, `posts`.`category_id`, `posts`.`user_id`, `categories`.`name` as `post_category`, `users`.`name` as `post_author` ";
        $sql .= "FROM `posts` ";
        $sql .= "JOIN `users` ON `users`.`id` = `posts`.`user_id` ";
        $sql .= "JOIN `categories` ON `categories`.`id` = `posts`.`category_id` ";
        
        return $sql;
    }

    public function get_all_posts()
    {
        $sql = $this->select_posts_data();
        $sql .= "ORDER BY `created_at` DESC";
        
        $query = $this->db->query($sql);        
        return $query->result_array();
    }

    public function get_last_three_posts() 
    {
        $sql = $this->select_posts_data();
        $sql .= "LIMIT 3";

        $query = $this->db->query($sql);        
        return $query->result_array();
    }

    public function get_post_by_id($id)
    {
        $sql = $this->select_posts_data();
        $sql .= "WHERE `posts`.`id` = " . $id;
        
        $query = $this->db->query($sql);        
        return $query->row_array();      
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }


    public function create_post() 
    {     
        $this->load->library('upload');

        $data = array(
            'title'         => $this->input->post('title'),
            'body'          => $this->input->post('body'),
            'post_image'    => $this->upload->data('file_name'),
            'slug'          => $this->input->post('slug'),
            'category_id'   => $this->input->post('category_id'),
            'user_id'       => 1
        );

        $this->db->insert('posts', $data);

        $flashdata = [
            'message'   => 'Created',
            'form-name' => 'Post'
        ];
        $this->session->set_flashdata($flashdata);
        redirect('posts/admin');
    }

    public function update_post()
    {
        //   $this->load->library('upload');

        $data = array(
            'title'         => $this->input->post('title'),
            'body'          => $this->input->post('body'),
            // 'post_image'    => 'pic-3.jpg',
            'slug'          => $this->input->post('slug'),
            'category_id'   => $this->input->post('category_id'),
            'user_id'       => $this->input->post('user_id')
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('posts', $data);

        $flashdata = [
            'message'   => 'Updated',
            'form-name' => 'Post'
        ];
        $this->session->set_flashdata($flashdata);
        redirect('posts/admin');
    }

    public function delete_post($id)
    {
        $this->db->delete('posts', array('id' => $id));

        $flashdata = [
            'message'   => 'Deleted',
            'form-name' => 'Post'
        ];
        $this->session->set_flashdata($flashdata);
        redirect('posts/admin');
    }

    public function count_all_posts()
    {
        $sql = $this->select_posts_data();

        $query = $this->db->query($sql);        
        return $query->num_rows();      
    }

    public function count_posts_by_user()
    {
        $query = $this->db->query('
            SELECT name, COUNT(name) 
            FROM posts 
            JOIN users ON posts.user_id = users.id 
            GROUP BY name 
            ORDER BY name ASC 
            LIMIT 5
        ');

        return $query->result_array();		
    }

  public function count_posts_by_cat()
  {
      $query = $this->db->query('
        SELECT name, color, COUNT(name) 
        FROM posts
        JOIN categories ON posts.category_id = categories.id
        GROUP BY name
        ORDER BY name ASC
      ');

      return $query->result_array();
  }
  
}