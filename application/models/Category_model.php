<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

  public function get_categories()
  {
      $query = $this->db->get('categories');
      return $query->result_array();
  }

  public function get_category_by_id($id)
  {
      $query = $this->db->get_where('categories', array('id' => $id));
      return $query->row_array();      
  }

  public function count_all_categories()
  {
        $query = $this->db->get('categories');
        return $query->num_rows();
  }

  public function create_category() 
  {     
        $data = array(
            'name'          => $this->input->post('name'),
            'slug'          => $this->input->post('slug'),
            'description'   => $this->input->post('description')
        );

        $this->db->insert('categories', $data);

        $flashdata = [
            'message'   => 'Created',
            'form-name' => 'Category'
        ];
        $this->session->set_flashdata($flashdata);
        redirect('categories/admin');
  }

  public function update_category()
  {

      $data = array(
          'name'          => $this->input->post('name'),
          'slug'          => $this->input->post('slug'),
          'description'   => $this->input->post('description')
      );

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('categories', $data);

      $flashdata = [
        'message'   => 'Updated',
        'form-name' => 'Category'
      ];
      $this->session->set_flashdata($flashdata);
      redirect('categories/admin');
  }

  public function delete_category($id)
  {
      $this->db->delete('categories', array('id' => $id));
      $this->session->set_flashdata('message', 'Deleted');
      redirect('categories/admin');
  }



}