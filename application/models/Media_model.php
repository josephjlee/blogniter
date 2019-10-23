<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_MODEL {

  public function get_all_images()
  {
      $sql = "SELECT `url`, `id` FROM `images`";

      $query = $this->db->query($sql);
      return $query->result_array();
  }

  public function get_image_by_id($id)
  {
      $this->db->where('id', $id);
      $query = $this->db->get('images');      

      return $query->row_array();
  }

  public function upload()
  {
      $upload_data['title'] = $this->input->post('title');
      $upload_data['alt']   = $this->input->post('alt');
      $upload_data['url']   = $this->upload->data('file_name');

      $this->db->insert('images', $upload_data);

      $flashdata = [
        'message'	  => 'Uploaded',
        'form-name'	=> 'Media'
      ];
      $this->session->set_flashdata($flashdata);
      redirect('media');
  }

  public function update()
  {
      $image_id      = $this->input->post('id');
      $data['title'] = $this->input->post('title');
      $data['alt']   = $this->input->post('alt');

      $this->db->where('id', $image_id);
      $this->db->update('images', $data);

      $flashdata = [
        'message'	  => 'Updated',
        'form-name'	=> 'Media'
      ];
      $this->session->set_flashdata($flashdata);
      redirect('media');
  }

  public function delete($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('images');

      $flashdata = [
        'message'	  => 'Deleted',
        'form-name'	=> 'Media'
      ];
      $this->session->set_flashdata($flashdata);
      redirect('media');
  }

}