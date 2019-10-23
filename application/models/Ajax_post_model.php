<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_post_model extends CI_Model {

	public function prep_dt_query()
    {       
        $email  = $this->session->userdata('email');
        $user   = $this->dashboard->get_user_by_email($email);

        //   Make Query
        $sql = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`created_at`, `categories`.`name` as `post_category`, `users`.`name` as `post_author` ";
		$sql .= "FROM `posts` ";
		$sql .= "JOIN `users` ON `users`.`id` = `posts`.`user_id` ";
		$sql .= "JOIN `categories` ON `categories`.`id` = `posts`.`category_id` ";

        // If the user is not Admin, include the 'where' clause
        if ( $user['role_id'] != 1 )
        {
            $sql .= "WHERE `user_id` = " . $user['id'] . " ";
        }

        return $sql;
    }

    public function is_searching_dt()
    {
        $email  = $this->session->userdata('email');
        $user   = $this->dashboard->get_user_by_email($email);
        $search = $this->input->post('search')['value'];
        // $search = 'jalu';

        $sql = '';

         // If user performs searching data, include 'like/or_like' clause
         if ( !empty($search) )
         {   
             if ( $user['role_id'] != 1 )
             {
                 $sql .= "AND (";
                 $sql .= "`title` LIKE '%" . $search . "%' ESCAPE '!' ";
                 $sql .= "OR `categories`.`name` LIKE '%" . $search . "%' ESCAPE '!' ";
                 $sql .= "OR `users`.`name` LIKE '%" . $search . "%' ESCAPE '!' ";
                 $sql .= ") ";
             }
             else
             {
                 $sql .= "WHERE `title` LIKE '%" . $search . "%' ESCAPE '!' ";
                 $sql .= "OR `categories`.`name` LIKE '%" . $search . "%' ESCAPE '!' ";
                 $sql .= "OR `users`.`name` LIKE '%" . $search . "%' ESCAPE '!' ";
             }
        }

        return $sql;        
    }

    public function is_ordering_dt()
    {
        $columns = [
            0 => 'title', 
            1 => 'post_category',
            2 => 'post_author',
            3 => 'created_at',
        ];
        
        $order  = $this->input->post('order');

        $sql = '';

        // If user performs ordering, include 'order_by' clause
        if ( !empty($order) )
        {
            $sql .= "ORDER BY `" . $columns[$order[0]['column']] . "` " . strtoupper($order[0]['dir']) . " ";
        }

        return $sql;
    }

    public function is_limiting_dt()
    {
        $limit  = $this->input->post('length');
        $start  = $this->input->post('start');
        
        $sql = '';

        if ( $limit != -1 )
        {
            $sql .= "LIMIT " . $start . ', ' . $limit;
        }

        return $sql;
    }

    public function get_datatable()
    {
        $sql = $this->prep_dt_query();
        $sql .= $this->is_searching_dt();
        $sql .= $this->is_ordering_dt();
        $sql .= $this->is_limiting_dt();
        
        $query = $this->db->query($sql); 
        return $query->result_array(); 

        // return $sql;
    }

    public function count_all_dt()
    {
        $sql = $this->prep_dt_query();

        $query = $this->db->query($sql);        
        return $query->num_rows();
    }

    public function count_filtered_dt()
    {
        $sql = $this->prep_dt_query();
        $sql .= $this->is_searching_dt();

        $query = $this->db->query($sql);        
        return $query->num_rows();
    }

   

}