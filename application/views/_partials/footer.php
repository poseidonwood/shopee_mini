<!-- Footer Nav-->
<div class="footer-nav-area" id="footerNav">
  <div class="suha-footer-nav h-100">
    <ul class="h-100 d-flex align-items-center justify-content-between">
      <li class="active">
        <a href="<?= base_url(); ?>"><i class="lni-home"></i>Home</a>
      </li>
      <li>
        <a href="message.html"><i class="lni-support"></i>Support</a>
      </li>
      <li>
        <a href="<?= base_url('product/cart'); ?>"><i class="lni-cart">
          </i>Cart <?php if ($count_cart > 0) {
                      echo "<span id='count_cart' class='badge text-white bg-danger count_cart'>$count_cart</span>";
                    } else {
                      echo "<span id='count_cart' class='badge text-white bg-danger count_cart'></span>";
                    }
                    ?></a>
      </li>
      <li>
        <a href="pages.html"><i class="lni-heart"></i>Pages</a>
      </li>
      <li>
        <a href="#"><i class="lni-cog"></i>Settings</a>
      </li>
    </ul>
  </div>
</div>