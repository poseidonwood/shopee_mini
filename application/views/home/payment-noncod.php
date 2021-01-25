<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header_back');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <div class="container">
    <!-- Checkout Wrapper-->
    <div class="checkout-wrapper-area py-3">
      <div class="credit-card-info-wrapper">
        <img class="d-block mb-4" src="<?= base_url('assets/'); ?>img/bg-img/12.png" alt="" />
        <div class="bank-ac-info">
          <p>
            Segera lakukan pembayaran agar transaksi anda segera kami proses dengan rincian sebagai berikut
          </p>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Bank <span><?= $namabank; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Atas Nama <span><?= $pemilik; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              No. Rekening <span><?= $no; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Total Pembayaran <span><b><?= "Rp. " . number_format($total, 0, ',', '.'); ?></b></span>
            </li>
          </ul>
        </div>
        <a class="btn btn-warning btn-lg w-100" href="payment-success.html">Pembayaran Selesai</a>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->view('_partials/footer');
$this->load->view('_partials/modal');
$this->load->view('_partials/js');
?>
</body>

</html>