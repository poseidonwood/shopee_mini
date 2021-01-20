<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <div class="container">
    <!-- Cart Wrapper-->
    <div class="cart-wrapper-area py-3">
      <div class="cart-table card mb-3">
        <div class="table-responsive card-body">
          <table class="table mb-0">
            <tbody>

              <?php
              if (is_array($product)) {
                foreach ($product as $listproduct) {
                  //cari foto by id_product
                  echo
                  "<tr>
               <th scope='row'>
                 <a class='remove-product' href='#' onclick ='deleteCart($listproduct->id_product,$listproduct->id_cart)'><i class='lni-close'></i></a>
               </th>
               <td><img src='" . base_url('upload/product/') . "$listproduct->foto' alt='' /></td>
               <td>
                 <a href=''" . base_url('product/detail/') . "$listproduct->id_product/$listproduct->nm_barang'>$listproduct->nm_barang<span id='cart_$listproduct->id_cart'>Rp " . number_format($listproduct->harga_jual, 0, ',', '.') . " × $listproduct->qty = Rp " . number_format($listproduct->sub_harga, 0, ',', '.') . " </span></a>
               </td>
               <td>
                 <div class='quantity'>
                   <input class='qty-text' name='qty_$listproduct->id_cart' type='text' value='$listproduct->qty' onkeypress='return isNumberKey(event)' maxlength='3' onchange='updateqty($listproduct->id_cart,$listproduct->id_product,$listproduct->berat,$listproduct->harga_jual)' />
                   <input id='qty-hidden_$listproduct->id_cart' type='hidden' value='$listproduct->qty'>
                 </div>
               </td>
             </tr>";
                  $total = $listproduct->sub_harga++;
                }

              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Coupon Area-->
      <div class="card coupon-card mb-3">
        <div class="card-body">
          <div class="apply-coupon">
            <h6 class="mb-0">Have a coupon?</h6>
            <p class="mb-2">
              Enter your coupon code here &amp; get awesome discounts!
            </p>
            <div class="coupon-form">
              <form action="#">
                <input class="form-control" type="text" placeholder="SUHA30" />
                <button class="btn btn-primary" type="submit">Apply</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Cart Amount Area-->
      <div class="card cart-amount-area">
        <div class="card-body d-flex align-items-center justify-content-between">
          <h5 id="total_harga" class="total-price mb-0 total_harga">
            Rp <span><?= number_format($total_harga->sub_harga, 0, ',', '.'); ?></span>
          </h5>
          <a class="btn btn-warning" href="<?= base_url('product/checkout/'); ?>">Checkout Now</a>
        </div>
      </div>
    <?php
              } else {
                echo "Keranjang Anda kosong ...  Silahkan belanja terlebih dahulu !";
              }
    ?>
    </div>
  </div>
</div>
<?php
$this->load->view('_partials/footer');
$this->load->view('_partials/js');
?>
</body>

</html>