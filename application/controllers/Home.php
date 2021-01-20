<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_db');
  }
  public function index()
  {
    $data = array(
      "category" => $this->Model_db->get_category('to_category', '1'),
      "product" => $this->Model_db->get_product('to_product', '10'),
      "title" => "TokTek | Toko Teknik Online",
      "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
    );
    $this->load->view('home/index', $data);
  }
  public function product()
  {
    $data = array(
      "category" => $this->Model_db->get_category('to_category', '1'),
      "title" => "Input Product | TokTek | Toko Teknik Online",
      "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
    );
    $this->load->view('home/be-product', $data);
  }
}
