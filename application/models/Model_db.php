<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_db extends CI_Model
{

  public function get_category($table, $value)
  {
    $this->db->select("*");
    $this->db->from($table);
    $this->db->where('status', $value);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return NULL;
    }
  }
  public function get_product($table, $value)
  {
    $this->db->select("*");
    $this->db->from($table);
    // $this->db->where('status', $value);
    $this->db->limit($value);
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return NULL;
    }
  }
  public function get_single_product($table, $value)
  {
    $this->db->select("*");
    $this->db->from($table);
    $this->db->where('id', $value);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return NULL;
    }
  }
  private function _uploadImage()
  {
    $config['upload_path']          = './upload/product/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = $this->product_id;
    $config['overwrite']      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      return $this->upload->data("file_name");
    }

    return "default.jpg";
  }
  // crud
  public function create($table, $value)
  {
    $this->db->insert($table, $value);
    return true;
  }
  public function delete($table, $colomn, $value)
  {
    $this->db->where($colomn, $value);
    $this->db->delete($table);
    return true;
  }
  public function update($table, $value, $id)
  {

    $this->db->set($value);
    $this->db->where('id_cart', $id);
    $this->db->update($table);
    return true; // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2 
  }

  // crud



  // Cart
  public function cart($table, $value1, $value2, $value3)
  {
    $this->db->select("*");
    $this->db->from($table);
    $this->db->where('id_product', $value1);
    $this->db->where('id_user', $value2);
    $this->db->where('status', $value3);

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return NULL;
    }
  }
  public function get_cart_joinimage($table, $value1, $value2)
  {

    $this->db->select('*');
    $this->db->from($table);
    $this->db->join('to_product', 'to_product.id = to_cart.id_product');
    $this->db->where('id_user', $value1);
    $this->db->where('status', $value2);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return NULL;
    }
  }

  public function get_cart_sum($table, $value1, $value2)
  {

    $this->db->select_sum('sub_harga');
    $this->db->from($table);
    $this->db->where('id_user', $value1);
    $this->db->where('status', $value2);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return NULL;
    }
  }
  public function get_cart_sum_weight($table, $value1, $value2)
  {

    $this->db->select_sum('berat_total');
    $this->db->from($table);
    $this->db->where('id_user', $value1);
    $this->db->where('status', $value2);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return NULL;
    }
  }
  public function count_cart($table, $value2, $value3)
  {
    $this->db->select("*");
    $this->db->from($table);
    $this->db->where('id_user', $value2);
    $this->db->where('status', $value3);

    $query = $this->db->get();
    return $query->num_rows();
  }
  // End cart


  // User
  public function get_user($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('ip', $value);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return NULL;
    }
  }

  public function get_codecity($table, $value1)
  {

    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('ip', $value1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return null;
    }
  }

  // End User
}

/* End of file Model_db.php */
