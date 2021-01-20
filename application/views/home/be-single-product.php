<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <!-- Product Slides-->
  <div class="product-slides owl-carousel">
    <!-- Single Hero Slide-->
    <div class="single-product-slide">
      <img src="<?= base_url('upload/product/') . $product->foto; ?>" alt="" />
    </div>
    <!-- <div class="single-product-slide">
      <img src="<?= base_url('assets/img'); ?>/bg-img/10.jpg" alt="" />
    </div>
    <div class="single-product-slide">
      <img src="<?= base_url('assets/img'); ?>/bg-img/11.jpg" alt="" />
    </div> -->
  </div>
  <div class="product-description pb-3">
    <!-- Product Title & Meta Data-->
    <div class="product-title-meta-data bg-white mb-3 py-3">
      <div class="container d-flex justify-content-between">
        <div class="p-title-price">
          <h6 class="mb-1"><?= $product->nama; ?></h6>
          <p class="sale-price mb-0">Rp <?= number_format($product->harga, 0, ',', '.'); ?></p>
        </div>
        <div class="p-wishlist-share">
          <a href="wishlist-grid.html"><i class="lni-heart-filled"></i></a>
          <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="lni-share"></i></a> -->
        </div>
      </div>
      <!-- Ratings-->
      <div class="product-ratings">
        <div class="container d-flex align-items-center justify-content-between">
          <div class="ratings">
            <?php
            $rating = $product->rating;
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
            echo $rating;
            $encode_name = urlencode("$product->nama");
            $decode_name = str_replace("+", "%20", $encode_name);
            ?></div>
          <div class="total-result-of-ratings">
            <!-- <span>4.96</span><span>Very Good</span> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Add To Cart-->
    <div class="cart-form-wrapper bg-white mb-3 py-3">
      <div class="container">
        <form class="cart-form" action="#" method="post">
          <input class="form-control" type="number" id="qty2" step="1" min="1" max="12" name="quantity" value="1" /><a class="btn btn-danger mr-2" href="checkout.html">Buy Now</a>
          <button class="btn btn-warning" type="submit">Add to cart</button>
        </form>
      </div>
    </div>
    <!-- Share Panel-->
    <div class="selection-panel bg-white mb-3 py-3">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="choose-color-wrapper">
          <p class="mb-0">Share Panel</p>
          <div class="choose-color-radio d-flex align-items-center">
            <!-- <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm3.6 11.5h-2.1v7h-3v-7h-2v-2h2V8.34c0-1.1.35-2.82 2.65-2.82h2.35v2.3h-1.4c-.25 0-.6.13-.6.66V9.5h2.34l-.24 2z" /></svg>
                </div>
              </div>
            </a>

            <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm5.26 9.38v.34c0 3.48-2.64 7.5-7.48 7.5-1.48 0-2.87-.44-4.03-1.2 1.37.17 2.77-.2 3.9-1.08-1.16-.02-2.13-.78-2.46-1.83.38.1.8.07 1.17-.03-1.2-.24-2.1-1.3-2.1-2.58v-.05c.35.2.75.32 1.18.33-.7-.47-1.17-1.28-1.17-2.2 0-.47.13-.92.36-1.3C7.94 8.85 9.88 9.9 12.06 10c-.04-.2-.06-.4-.06-.6 0-1.46 1.18-2.63 2.63-2.63.76 0 1.44.3 1.92.82.6-.12 1.95-.27 1.95-.27-.35.53-.72 1.66-1.24 2.04z" /></svg>
                </div>
              </div>
            </a> -->

            <a class="resp-sharing-button__link" href="whatsapp://send?text=
            <?= urlencode("Nih produk kami di lapak teknik buruan cek ya \n\n" . base_url("product/detail/$product->id/") . $decode_name . ""); ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24">
                    <path d="m12 0c-6.6 0-12 5.4-12 12s5.4 12 12 12 12-5.4 12-12-5.4-12-12-12zm0 3.8c2.2 0 4.2 0.9 5.7 2.4 1.6 1.5 2.4 3.6 2.5 5.7 0 4.5-3.6 8.1-8.1 8.1-1.4 0-2.7-0.4-3.9-1l-4.4 1.1 1.2-4.2c-0.8-1.2-1.1-2.6-1.1-4 0-4.5 3.6-8.1 8.1-8.1zm0.1 1.5c-3.7 0-6.7 3-6.7 6.7 0 1.3 0.3 2.5 1 3.6l0.1 0.3-0.7 2.4 2.5-0.7 0.3 0.099c1 0.7 2.2 1 3.4 1 3.7 0 6.8-3 6.9-6.6 0-1.8-0.7-3.5-2-4.8s-3-2-4.8-2zm-3 2.9h0.4c0.2 0 0.4-0.099 0.5 0.3s0.5 1.5 0.6 1.7 0.1 0.2 0 0.3-0.1 0.2-0.2 0.3l-0.3 0.3c-0.1 0.1-0.2 0.2-0.1 0.4 0.2 0.2 0.6 0.9 1.2 1.4 0.7 0.7 1.4 0.9 1.6 1 0.2 0 0.3 0.001 0.4-0.099s0.5-0.6 0.6-0.8c0.2-0.2 0.3-0.2 0.5-0.1l1.4 0.7c0.2 0.1 0.3 0.2 0.5 0.3 0 0.1 0.1 0.5-0.099 1s-1 0.9-1.4 1c-0.3 0-0.8 0.001-1.3-0.099-0.3-0.1-0.7-0.2-1.2-0.4-2.1-0.9-3.4-3-3.5-3.1s-0.8-1.1-0.8-2.1c0-1 0.5-1.5 0.7-1.7s0.4-0.3 0.5-0.3z" /></svg>
                </div>
              </div>
            </a>

            <!-- <a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 23.5c6.35 0 11.5-5.15 11.5-11.5S18.35.5 12 .5.5 5.65.5 12 5.65 23.5 12 23.5zM2.505 11.053c-.31.118-.505.738-.505.738s.203.62.513.737l3.636 1.355 1.417 4.557a.787.787 0 0 0 1.25.375l2.115-1.72a.29.29 0 0 1 .353-.01L15.1 19.85a.786.786 0 0 0 .746.095.786.786 0 0 0 .487-.573l2.793-13.426a.787.787 0 0 0-1.054-.893l-15.568 6z" fill-rule="evenodd" /></svg>
                </div>
              </div>
            </a> -->
          </div>
        </div>
        <!-- <div class="choose-size-wrapper text-right">
          <p class="mb-0">Size</p>
          <ul class="mb-0 choose-size-radio d-flex align-items-center">
            <li><a href="#">S</a></li>
            <li class="active"><a href="#">M</a></li>
            <li><a href="#">L</a></li>
          </ul>
        </div> -->
      </div>
    </div>

    <!-- Product Specification-->
    <div class="p-specification bg-white mb-3 py-3">
      <div class="container">
        <h6>Specifications</h6>
        <p>
          <?= $product->deskripsi; ?>
        </p>
        <hr>
        <ul>
          <li>100% good reviews</li>
          <li>7 days returns</li>
          <li>Warranty not aplicable</li>
        </ul>
      </div>
    </div>
    <!-- Rating & Review Wrapper-->
    <div class="rating-and-review-wrapper bg-white py-3 mb-3">
      <div class="container">
        <h6>Ratings &amp; Reviews</h6>
        <div class="rating-review-content">
          <ul>
            <li class="single-user-review d-flex">
              <div class="user-thumbnail">
                <img src="<?= base_url('assets/img'); ?>/bg-img/7.jpg" alt="" />
              </div>
              <div class="rating-comment">
                <div class="rating">
                  <i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i>
                </div>
                <p class="comment mb-0">
                  Very good product. It's just amazing!
                </p>
                <span class="name-date">Designing World 12 Dec 2020</span>
              </div>
            </li>
            <li class="single-user-review d-flex">
              <div class="user-thumbnail">
                <img src="<?= base_url('assets/img'); ?>/bg-img/8.jpg" alt="" />
              </div>
              <div class="rating-comment">
                <div class="rating">
                  <i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i>
                </div>
                <p class="comment mb-0">WOW excellent product. Love it.</p>
                <span class="name-date">Designing World 8 Dec 2020</span>
              </div>
            </li>
            <li class="single-user-review d-flex">
              <div class="user-thumbnail">
                <img src="<?= base_url('assets/img'); ?>/bg-img/9.jpg" alt="" />
              </div>
              <div class="rating-comment">
                <div class="rating">
                  <i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i>
                </div>
                <p class="comment mb-0">
                  What a nice product it is. I am looking it's.
                </p>
                <span class="name-date">Designing World 28 Nov 2020</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Ratings Submit Form-->
    <div class="ratings-submit-form bg-white py-3">
      <div class="container">
        <h6>Submit A Review</h6>
        <form action="#" method="POST">
          <div class="form-group">
            <div class="stars">
              <input class="star-1" type="radio" name="star" id="star1" />
              <label class="star-1" for="star1"></label>
              <input class="star-2" type="radio" name="star" id="star2" />
              <label class="star-2" for="star2"></label>
              <input class="star-3" type="radio" name="star" id="star3" />
              <label class="star-3" for="star3"></label>
              <input class="star-4" type="radio" name="star" id="star4" />
              <label class="star-4" for="star4"></label>
              <input class="star-5" type="radio" name="star" id="star5" />
              <label class="star-5" for="star5"></label><span></span>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="comments" name="comment" cols="30" rows="10" data-max-length="200"></textarea>
          </div>
          <button class="btn btn-sm btn-primary" type="submit">
            Save Review
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->view('_partials/footer');
$this->load->view('_partials/js');
?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>