<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <!-- Top Products-->
  <div class="top-products-area pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="ml-1">All Products</h6>
        <!-- Layout Options-->
        <div class="layout-options">
          <a href="<?= base_url('product/shopgrid'); ?>"><i class="lni-grid-alt"></i></a><a class="active" href="<?= base_url('product/shoplist'); ?>"><i class="lni-radio-button"></i></a>
        </div>
      </div>
      <div class="row">
        <!-- Single Weekly Product Card-->
        <?php
        foreach ($product as $listproduct) {
          $harga = $listproduct->harga;
          $rating = $listproduct->rating;
          if ($rating > 0 && $rating <= 1) {
            $rating =  "<i class='lni-star-filled'></i><i class='lni-star'></i><i class='lni-star'></i><i class='lni-star'></i><i class='lni-star'></i>";
            // $rating_bintang = "0-1";
          } else if ($rating > 1 && $rating <= 2) {
            $rating =  "<i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star'></i><i class='lni-star'></i><i class='lni-star'></i>";
            // $rating_bintang = "1-2";
          } else if ($rating > 2 && $rating <= 3) {
            $rating =  "<i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star'></i><i class='lni-star'></i>";
            // $rating_bintang = "2-3";
          } else if ($rating > 3 && $rating <= 4) {
            $rating =  "<i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star'></i>";
            // $rating_bintang = "3-4";
          } else if ($rating > 4 && $rating <= 5) {
            $rating =  "<i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star-filled'></i><i class='lni-star-filled'></i>";
            // $rating_bintang = "4-5";
          } else {
            $rating = "Belum ada penilaian";
          }
          echo "
          <div class='col-12'>
          <div class='card weekly-product-card mb-3'>
            <div class='card-body d-flex align-items-center'>
              <div class='product-thumbnail-side'>
                <span class='badge badge-success'>Sale</span><a class='wishlist-btn' href='#'><i class='lni-heart-filled'></i></a><a class='product-thumbnail d-block' href='" . base_url('product/detail/') . "$listproduct->id/$listproduct->nama'><img src='" . base_url("upload/product/$listproduct->foto") . "' alt='' /></a>
              </div>
              <div class='product-description'>
                <a class='product-title d-block' href='" . base_url('product/detail/') . "$listproduct->id/$listproduct->nama'>$listproduct->nama</a>
                <p class='sale-price'>
                  <i class='lni-dollar'></i>Rp " . number_format($harga, 0, ',', '.') . "
                </p>
                <div class='product-rating'>
                  <!--<i class='lni-star-filled'></i>4.88 (39)-->
                  $rating
                </div>
                <a class='btn btn-success btn-sm add2cart-notify' href='#'><i class='mr-1 lni-cart'></i>Buy</a>
              </div>
            </div>
          </div>
        </div>
";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->view('_partials/footer');
$this->load->view('_partials/js');
?>
</body>

</html>