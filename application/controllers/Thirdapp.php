<?php defined('BASEPATH') or exit('No direct script access allowed');
class Thirdapp extends CI_Controller
{
  public $api_key = "9df74fce98bcf058a01f1e32b09fa8c1";
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_db');
  }
  public function cost($id_kota_tujuan = null, $id_kota_asal = null, $berat = null)
  {
    $kurir = $this->input->get('kurir');
    if (!empty($berat)) {
      if ($berat <= 30000) {
        $hitung_ongkir = json_decode($this->hitungcost($id_kota_asal, $id_kota_tujuan, $berat, $kurir), true);
        $hasil_ongkir = $hitung_ongkir['rajaongkir']['results'][0]['costs'];
        $data['costs'] = $hasil_ongkir;
        $data['berat_total'] = $berat;
        echo json_encode($data);
        // echo $id_kota_asal . "/" . $id_kota_tujuan . "/" . $berat . "/" . $kurir;
      } else {
        echo json_encode(array('result' => 'Over Weight'));
      }
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
  // WA============
  function sendwa($number, $message)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://whatsapp-api-by-fekusa.herokuapp.com/send-message',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => "number=$number&message=$message",
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
}
