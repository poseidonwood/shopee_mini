<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
  public $api_key = "9df74fce98bcf058a01f1e32b09fa8c1";
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_db');
    $this->load->model('Model_notif');
  }
  public function index()
  {
    redirect('home/');
  }
  public function detail($id = null, $product = null)
  {
    if (!isset($id)) {
      echo "id tidak boleh null";
    } else if (!isset($product)) {
      echo "product tidak boleh null";
    } else {
      // echo "id : $id";
      // echo "<br> product : " . urldecode($product);
      //cek product dengan id yang sudah di includekan
      $cek = $this->Model_db->get_single_product('to_product', $id);
      if ($cek == null) {
        show_404();
      } else {
        $data = array(
          "product" => $cek,
          "title" => "TokTek | Toko Teknik Online",
          "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
        );
        $this->load->view('home/be-single-product', $data);
      }
    }
  }
  public function shopgrid()
  {
    $data = array(
      "product" => $this->Model_db->get_product('to_product', '10'),
      "title" => "TokTek | Toko Teknik Online",
      "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
    );
    $this->load->view('home/shop-grid', $data);
  }
  public function shoplist()
  {
    $data = array(
      "product" => $this->Model_db->get_product('to_product', '10'),
      "title" => "TokTek | Toko Teknik Online",
      "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
    );
    $this->load->view('home/shop-list', $data);
  }
  public function cart()
  {
    $data = array(
      "product" => $this->Model_db->get_cart_joinimage('to_cart', $this->input->ip_address(), 'UNPAID'),
      "total_harga" => $this->Model_db->get_cart_sum('to_cart', $this->input->ip_address(), 'UNPAID'),
      "title" => "TokTek | Toko Teknik Online",
      "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID')
    );
    $this->load->view('home/cart', $data);
  }
  public function checkout()
  {
    $c_id_kota_tujuan = $this->Model_db->get_codecity('to_user', $this->input->ip_address());
    if ($c_id_kota_tujuan !== null) {
      $id_kota_tujuan = $c_id_kota_tujuan->kabupaten;
    } else {
      $id_kota_tujuan = null;
    }
    $id_kota_asal = $this->Model_db->get_single_product('to_profile', '1')->city_code;
    $berat = $this->Model_db->get_cart_sum_weight('to_cart', $this->input->ip_address(), 'UNPAID')->berat_total;
    if ($id_kota_tujuan == null) {
      $registered = false;
      $jne = "";
      $tiki = "";
      $pos = "";
    } else {
      $registered = true;
      $jne = json_decode($this->getcostcourier($id_kota_tujuan, $id_kota_asal, $berat, 'jne'), true);
      $tiki = json_decode($this->getcostcourier($id_kota_tujuan, $id_kota_asal, $berat, 'tiki'), true);
      $pos = json_decode($this->getcostcourier($id_kota_tujuan, $id_kota_asal, $berat, 'pos'), true);
    }
    $total_harga = $this->Model_db->get_cart_sum('to_cart', $this->input->ip_address(), 'UNPAID');
    if ($total_harga->sub_harga > 0) {
      //cek user
      $c_user = $this->Model_db->get_user('to_user', $this->input->ip_address());
      if (isset($c_user)) {
        $nama = $c_user->nama;
        $email = $c_user->email;
        $phone = $c_user->phone;
        $alamat = $c_user->alamat;
      } else {
        $nama = "Data Belum Ada";
        $email = "Data Belum Ada";
        $phone = "Data Belum Ada";
        $alamat = "Data Belum Ada";
      }
      $data = array(
        "back_button" => base_url('product/cart'),
        "nama" => $nama,
        "email" => $email,
        "phone" => $phone,
        "alamat" => $alamat,
        "listkabupaten" => $this->kabupaten(),
        "total_harga" => $total_harga->sub_harga,
        "title" => "TokTek | Toko Teknik Online",
        "header" => "Billing Information",
        "count_cart" => $this->Model_db->count_cart('to_cart', $this->input->ip_address(), 'UNPAID'),
        "jne" => $jne,
        "tiki" => $tiki,
        "pos" => $pos,
        "registered" => $registered

      );
      $this->load->view('home/checkout', $data);
    } else {
      redirect('home/');
    }
  }







  // ============================Third APP RAJA ONGKIR ================================
  public function getcostcourier($id_kota_tujuan = null, $id_kota_asal = null, $berat = null, $kurir = null)
  {
    if (!empty($berat)) {
      if ($berat <= 30000) {
        $hitung_ongkir = json_decode($this->hitungcost($id_kota_asal, $id_kota_tujuan, $berat, $kurir), true);
        $hasil_ongkir = $hitung_ongkir['rajaongkir']['results'][0]['costs'];
        $data['costs'] = $hasil_ongkir;
        $data['berat_total'] = $berat;
        // echo json_encode($data);
        return json_encode($data);
        // echo $id_kota_asal . "/" . $id_kota_tujuan . "/" . $berat . "/" . $kurir;
      } else {
        // echo json_encode(array('result' => 'Over Weight'));
        return json_encode(array('result' => 'Over Weight'));
      }
    }
  }
  // Raja Ongkir 
  public function kabupaten()
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?key=9df74fce98bcf058a01f1e32b09fa8c1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
      echo 'cURL Error #:' . $err;
    } else {
      return json_decode($response);
    }
  }
  public function hitungcost($id_kota_asal = null, $id_kota_tujuan = null, $berat = null, $kurir = null)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=" . $id_kota_asal . "&destination=" . $id_kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
  // ================================END THIRD APP RAJA ONGKIR==============================
}
