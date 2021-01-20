<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Proses extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_db');
    $this->load->model('Model_notif');
  }
  public function upload_product()
  {
    if ((null !== $this->input->post('nama'))) {
      $config['upload_path']          = './upload/product';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 100000;
      $config['max_width']            = 10000;
      $config['max_height']           = 7000;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $data = array(
          "category" => $this->Model_db->get_category('to_category', '1'),
          "title" => "Input Product | TokTek | Toko Teknik Online",
          "error" => $this->upload->display_errors(),
          "alert" => ""
        );
        $this->load->view('home/be-product', $data);
      } else {
        $upload_data = $this->upload->data();
        // id	nama	id_category	deskripsi	foto	stok	created_at	
        $data = array(
          'id' => '',
          'nama' => $this->input->post('nama'),
          'id_category' => $this->input->post('category'),
          'deskripsi' => $this->input->post('deskripsi'),
          'foto' => $upload_data['file_name'],
          'stok' => $this->input->post('stok'),
          'berat' => $this->input->post('berat'),
          'harga' => $this->input->post('harga'),
          'rating' => "0",
          'created_at' => date('Y-m-d H:i:s')
        );
        $save = $this->Model_db->create('to_product', $data);
        if ($save == true) {
          $data = array(
            "category" => $this->Model_db->get_category('to_category', '1'),
            "title" => "Input Product | TokTek | Toko Teknik Online",
            "alert" => $this->Model_notif->success('Simpan Sukses')
          );
          $this->load->view('home/be-product', $data);
        } else {
          $data = array(
            "category" => $this->Model_db->get_category('to_category', '1'),
            "title" => "Input Product | TokTek | Toko Teknik Online",
            "error" => $this->upload->display_errors(),
            "alert" => ""

          );
          $this->load->view('home/be-product', $data);
        }
        // $this->Gambar_model->create($this->upload->data());
      }
    } else {
      redirect('home/product');
    }
  }
  public function order()
  {
    // $stok = $this->input->post('stok');
    $berat = $this->input->post('berat');
    $harga = $this->input->post('harga');
    $id = $this->input->post('id');
    //get nama by id
    $c_nama = $this->Model_db->get_single_product('to_product', $id);
    if ($c_nama == null) {
      $data = array(
        "notif" => "can't access"
      );
      echo json_encode($data, true);
    } else {
      $nama = $c_nama->nama;
      if ($harga == $c_nama->harga && $berat == $c_nama->berat && $c_nama->stok) {
        //cek apakah user id / ip address sama 
        $cek_cart = $this->Model_db->cart('to_cart', $id, $this->input->ip_address(), 'UNPAID');
        if ($cek_cart == true) {
          //jika ada product dan id_user / ip yang sama maka create data dengan iduser yang sama
          $param = array(
            "qty" => (int)$cek_cart->qty + 1,
            "berat_total" => (int)$berat * ((int)$cek_cart->qty + 1),
            "harga_jual" => $harga,
            "sub_harga" => $harga * ((int)$cek_cart->qty + 1),
          );
          $save = $this->Model_db->update('to_cart', $param, $cek_cart->id_cart);
          if ($save) {
            //ambil count cart
            $data = array(
              "notif" => $param,
              "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
            );
            echo json_encode($data, true);
          } else {
            $data = array(
              "notif" => "save fail",
              "count_cart" => ""
            );
            echo json_encode($data, true);
          }
        } else {
          $param = array(
            "id_cart" => "",
            "id_trx" => "",
            "id_product" => $id,
            "nm_barang" => $nama,
            "qty" => "1",
            "berat_total" => $c_nama->berat,
            "harga_jual" => $harga,
            "sub_harga" => $harga * 1,
            "created_date" => date("Y-m-d H:i:s"),
            "expired_date" => "",
            "id_user" => $this->input->ip_address(),
            "user_nama" => $this->input->ip_address(),
            "status" => "UNPAID",
          );
          $save = $this->Model_db->create('to_cart', $param);
          if ($save) {
            $data = array(
              "notif" => $param,
              "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
            );
            echo json_encode($data, true);
          } else {
            $data = array(
              "notif" => "save fail",
              "count_cart" => ""
            );
            echo json_encode($data, true);
          }
        }
      } else {
        $data = array(
          "notif" => "Wrong"
        );
        echo json_encode($data, true);
      }
    }
  }
  public function cariproduct()
  {
    $id = $this->input->post('id');
    $c_nama = $this->Model_db->get_single_product('to_product', $id);
    if ($c_nama == null) {
      $data = array(
        "notif" => "null"
      );
      echo json_encode($data, true);
    } else {
      $data = array(
        "notif" => "true",
        "nama" => $c_nama->nama
      );
      echo json_encode($data, true);
    }
  }
  public function deletecart()
  {
    // $id = $this->input->post('idcart');
    $id = $this->input->get('id');
    $this->Model_db->delete('to_cart', 'id_cart', $id);
    $data = array(
      "notif" => "true"
    );
    echo json_encode($data, true);
  }
  public function updateqty()
  {
    $id = $this->input->post('id');
    $id_product = $this->input->post('id_product');
    $qty = $this->input->post('qty');
    $berat = $this->input->post('berat');
    $harga = $this->input->post('harga');
    // $data = array('value' => $qty);
    // echo json_encode($data, true);
    $cek_cart = $this->Model_db->cart('to_cart', $id_product, $this->input->ip_address(), 'UNPAID');
    if ($cek_cart == true) {
      //jika ada product dan id_user / ip yang sama maka create data dengan iduser yang sama
      $param = array(
        "qty" => $qty,
        "berat_total" => (int)$berat * $qty,
        "harga_jual" => $harga,
        "sub_harga" => $harga * $qty
      );
      $save = $this->Model_db->update('to_cart', $param, $id);
      if ($save) {
        //ambil count cart
        $data = array(
          "qty" => $qty,
          "berat_total" => (int)$berat * $qty,
          "harga_jual" => $harga,
          "sub_harga" => $harga * $qty,
          "total_harga" => (int)$this->Model_db->get_cart_sum('to_cart', $this->input->ip_address(), 'UNPAID')->sub_harga
        );
        echo json_encode($data, true);
      } else {
        $data = array(
          "notif" => "save fail",
        );
        echo json_encode($data, true);
      }
    }
  }
  public function saveuser()
  {
    // id	nama	email	password	phone	alamat	kabupaten	status	ip	created_at	updated_at

    $nama = $this->input->post('nama');
    if (isset($nama)) {
      $email = $this->input->post('email');
      $phone = $this->input->post('phone');
      $alamat = $this->input->post('alamat');
      $kabupaten = $this->input->post('kabupaten');
      $ip = $this->input->ip_address();
      $created_at = date("Y-m-d H:i:s");
      $updated_at = "";

      $data = array(
        'id' => '',
        'nama' => $nama,
        'email' => $email,
        'password' => "NULL",
        'phone' => $phone,
        'alamat' => $alamat,
        'kabupaten' => $kabupaten,
        'status' => 'Y',
        'ip' => $ip,
        'created_at' => $created_at,
        'updated_at' => $updated_at
      );
      $this->Model_db->create('to_user', $data);
      redirect('product/checkout');
    } else {
      $data = array('notif' => 'you cant access');
      echo json_encode($data);
    }
  }
  // Create Transaksi 
  public function transaksi()
  {
    $jasa = $this->input->post('jasa');
    $ongkirnya = $this->input->post('ongkirnya');
    $data = array('jasa' => $jasa, 'ongkirnya' => $ongkirnya);
    echo json_encode($data);
  }
}