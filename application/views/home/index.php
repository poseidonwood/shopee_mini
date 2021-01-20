<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <!-- Hero Slides-->
  <div class="hero-slides owl-carousel">
    <!-- Single Hero Slide-->
    <div class="single-hero-slide">
      <div class="slide-img"><img src="<?= base_url('assets/'); ?>img/bg-img/1.jpg" alt="" /></div>
      <div class="slide-content h-100 d-flex align-items-center">
        <div class="container">
          <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">
            Amazon Echo
          </h4>
          <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">
            3rd Generation, Charcoal
          </p>
          <a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
        </div>
      </div>
    </div>
    <!-- Single Hero Slide-->
    <div class="single-hero-slide">
      <div class="slide-img"><img src="<?= base_url('assets/'); ?>img/bg-img/2.jpg" alt="" /></div>
      <div class="slide-content h-100 d-flex align-items-center">
        <div class="container">
          <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">
            Light Candle
          </h4>
          <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">
            Now only $22
          </p>
          <a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-wow-duration="1000ms">Buy Now</a>
        </div>
      </div>
    </div>
    <!-- Single Hero Slide-->
    <div class="single-hero-slide">
      <div class="slide-img"><img src="<?= base_url('assets/'); ?>img/bg-img/3.jpg" alt="" /></div>
      <div class="slide-content h-100 d-flex align-items-center">
        <div class="container">
          <h4 class="mb-0 text-dark" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">
            Best Furniture
          </h4>
          <p data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">
            3 years warranty
          </p>
          <a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Catagories-->
  <div class="product-catagories-wrapper pt-3">
    <div class="container">
      <div class="section-heading">
        <h6 class="ml-1">Product Category</h6>
      </div>
      <div class="product-catagory-wrap">
        <div class="row">
          <?php
          foreach ($category as $cat) {
            $id = $cat->id;
            $nama = $cat->nama;
            $icon = $cat->icon;
            $link = $cat->link;
            echo
              "<div class='col-4'>
              <div class='card mb-3 catagory-card'>
                <div class='card-body'>
                  <a href='$link'><i class='$icon'></i><span>$nama</span></a>
                </div>
              </div>
             </div>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Flash Sale Slide-->
  <div class="flash-sale-wrapper pb-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="ml-1">Flash Sale</h6>
        <a class="btn btn-primary btn-sm" href="flash-sale.html">View All</a>
      </div>
      <!-- Flash Sale Slide-->
      <div class="flash-sale-slide owl-carousel">
        <!-- Single Flash Sale Card-->
        <div class="card flash-sale-card">
          <div class="card-body">
            <a href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/1.jpg" alt="" /><span class="product-title">Short Cotton Tops</span>
              <p class="sale-price">
                $7.99<span class="real-price">$15</span>
              </p>
              <span class="progress-title">33% Sold Out</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </a>
          </div>
        </div>
        <!-- Single Flash Sale Card-->
        <div class="card flash-sale-card">
          <div class="card-body">
            <a href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/2.jpg" alt="" /><span class="product-title">Flower Shape Baby Dress</span>
              <p class="sale-price">
                $14<span class="real-price">$21</span>
              </p>
              <span class="progress-title">57% Sold Out</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </a>
          </div>
        </div>
        <!-- Single Flash Sale Card-->
        <div class="card flash-sale-card">
          <div class="card-body">
            <a href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/3.jpg" alt="" /><span class="product-title">Floral Long Sleve Salowar
              </span>
              <p class="sale-price">
                $36<span class="real-price">$49</span>
              </p>
              <span class="progress-title">100% Sold Out</span>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top Products-->
  <div class="top-products-area clearfix">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="ml-1">Top Products</h6>
        <a class="btn btn-danger btn-sm" href="<?= base_url('product/shopgrid'); ?>">View All</a>
      </div>
      <div class="row">
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
  <div class='col-6 col-sm-4'>
  <div class='card top-product-card mb-3'>
    <div class='card-body'>
      <span class='badge badge-success'>Sale</span><a class='wishlist-btn' href='#'><i class='lni-heart-filled'></i></a><a class='product-thumbnail d-block' href='" . base_url('product/detail/') . "$listproduct->id/$listproduct->nama'><img class='mb-2' src='" . base_url("upload/product/$listproduct->foto") . "' alt=''/></a><a class='product-title d-block' href='" . base_url('product/detail/') . "$listproduct->id/$listproduct->nama'>$listproduct->nama</a>
      <p class='sale-price'>Rp " . number_format($harga, 0, ',', '.') . "</p>
      <div class='product-rating'>
        $rating
      </div>
      <a class='btn btn-success btn-sm add2cart-notify' onclick='addorder($listproduct->id,$listproduct->stok,$listproduct->berat,$listproduct->harga)'href='#'><i class='lni-plus'></i></a>
    </div>
  </div>
</div>
  ";
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Cool Facts Area-->
  <div class="cta-area">
    <div class="container">
      <div class="cta-text px-4 py-5" style="background-image: url(<?= base_url('assets/img/bg-img/6.jpg'); ?>)">
        <h4>Winter Sale 20% Off</h4>
        <p>
          Suha is a multipurpose, creative &amp; <br />modern mobile
          template.
        </p>
        <a class="btn btn-danger" href="#">Shop Today</a>
      </div>
    </div>
  </div>
  <!-- Weekly Best Sellers-->
  <div class="weekly-best-seller-area pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="pl-1">Weekly Best Sellers</h6>
        <a class="btn btn-success btn-sm" href="shop-list.html">View All</a>
      </div>
      <div class="row">
        <!-- Single Weekly Product Card-->
        <div class="col-12">
          <div class="card weekly-product-card mb-3">
            <div class="card-body d-flex align-items-center">
              <div class="product-thumbnail-side">
                <span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni-heart-filled"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/10.jpg" alt="" /></a>
              </div>
              <div class="product-description">
                <a class="product-title d-block" href="single-product.html">Light Cotton Tops</a>
                <p class="sale-price">
                  <i class="lni-dollar"></i>$64<span>$89</span>
                </p>
                <div class="product-rating">
                  <i class="lni-star-filled"></i>4.88 (39)
                </div>
                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni-cart"></i>Buy</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Single Weekly Product Card-->
        <div class="col-12">
          <div class="card weekly-product-card mb-3">
            <div class="card-body d-flex align-items-center">
              <div class="product-thumbnail-side">
                <span class="badge badge-primary">Pre Order</span><a class="wishlist-btn" href="#"><i class="lni-heart-filled"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/7.jpg" alt="" /></a>
              </div>
              <div class="product-description">
                <a class="product-title d-block" href="single-product.html">Modern Gray Tops</a>
                <p class="sale-price">
                  <i class="lni-dollar"></i>$100<span>$160</span>
                </p>
                <div class="product-rating">
                  <i class="lni-star-filled"></i>4.82 (125)
                </div>
                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni-cart"></i>Buy</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Single Weekly Product Card-->
        <div class="col-12">
          <div class="card weekly-product-card mb-3">
            <div class="card-body d-flex align-items-center">
              <div class="product-thumbnail-side">
                <span class="badge badge-danger">-10%</span><a class="wishlist-btn" href="#"><i class="lni-heart-filled"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/12.jpg" alt="" /></a>
              </div>
              <div class="product-description">
                <a class="product-title d-block" href="single-product.html">Sun Glasses</a>
                <p class="sale-price">
                  <i class="lni-dollar"></i>$24<span>$32</span>
                </p>
                <div class="product-rating">
                  <i class="lni-star-filled"></i>4.79 (63)
                </div>
                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni-cart"></i>Buy</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Single Weekly Product Card-->
        <div class="col-12">
          <div class="card weekly-product-card mb-3">
            <div class="card-body d-flex align-items-center">
              <div class="product-thumbnail-side">
                <span class="badge badge-warning">Featured</span><a class="wishlist-btn" href="#"><i class="lni-heart-filled"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="<?= base_url('assets/'); ?>img/product/13.jpg" alt="" /></a>
              </div>
              <div class="product-description">
                <a class="product-title d-block" href="single-product.html">Wall Clock</a>
                <p class="sale-price">
                  <i class="lni-dollar"></i>$31<span>$47</span>
                </p>
                <div class="product-rating">
                  <i class="lni-star-filled"></i>4.99 (7)
                </div>
                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni-cart"></i>Buy</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card weekly-product-card mb-3">
            <div class="card-body d-flex align-items-center">
              Page rendered in <strong>&nbsp;{elapsed_time}&nbsp;</strong> seconds.
            </div>
          </div>
        </div>
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