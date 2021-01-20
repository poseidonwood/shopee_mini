<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header_back');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <div class="container">
    <!-- Checkout Wrapper-->
    <div class="checkout-wrapper-area py-3">
      <!-- Billing Address-->
      <div class="billing-information-card mb-4">
        <div class="card billing-information-title-card bg-danger">
          <div class="card-body">
            <h6 class="text-center mb-0 text-white">Billing Information</h6>
          </div>
        </div>
        <div class="card user-data-card">
          <div class="card-body">
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center">
                <i class="lni-user"></i><span>Full Name</span>
              </div>
              <div class="data-content" id="nama_text"><?= $nama; ?></div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center">
                <i class="lni-envelope"></i><span>Email Address</span>
              </div>
              <div class="data-content" id="email_text"><?= $email; ?></div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center">
                <i class="lni-phone-handset"></i><span>Phone</span>
              </div>
              <div class="data-content" id="phone_text"><?= $phone; ?></div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center">
                <i class="lni-map-marker"></i><span>Shipping Address</span>
              </div>
              <div class="data-content" id="alamat_text"><?= $alamat; ?></div>
            </div>
            <!-- Edit Address--><a class="btn btn-danger w-100" href="#" data-toggle="modal" data-target="#editprofile" id="editprofilebutton">Edit Billing Information</a>
          </div>
        </div>
      </div>
      <?php
      if ($registered == true) {

      ?>
        <!-- Shipping Method Choose-->
        <div class="shipping-method-choose mb-4">
          <div class="card shipping-method-choose-title-card bg-success">
            <div class="card-body">
              <h6 class="text-center mb-0 text-white">
                Shipping Method Choose
              </h6>
            </div>
          </div>
          <div class="card shipping-method-choose-card">
            <div class="card-body">
              <div class="shipping-method-choose">
                <ul>
                  <li>
                    <!-- JNE-->
                    <div class="card accordian-card clearfix">
                      <div class="card-body">
                        <h5 class="accordian-title">JNE</h5>
                        <div class="accordion" id="accordionExample">
                          <?php if (!empty($jne)) : ?>
                            <?php foreach ($jne['costs'] as $c) : ?>
                              <!-- Single Accordian-->
                              <div class="accordian-header" id="headingOne">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-toggle="collapse" data-target="#collapseOne<?= $c['service']; ?>" aria-expanded="false" aria-controls="collapseOne">
                                  <span><i class="lni lni-dollar"></i><?= "PAKET " . $c['service']; ?></span><i class="lni-chevron-right"></i>
                                </button>
                              </div>
                              <div class="collapse" id="collapseOne<?= $c['service']; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <p>
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="radioOne<?= $c['service']; ?>" value="<?= $c['cost'][0]['value']; ?>" onclick="getongkir('JNE - <?= $c['service']; ?>','<?= $c['cost'][0]['value']; ?>')">
                                  <label class="form-check-label" for="radioOne<?= $c['service']; ?>">
                                    <?= "Rp. " . $c['cost'][0]['value'] . " - Estimated (" . $c['cost'][0]['etd'] . " hari)"; ?>
                                  </label>
                                </p>
                              </div>
                          <?php endforeach;
                          endif; ?>
                        </div>
                      </div>
                    </div>
                    <br>
                  </li>
                  <li>
                    <!-- TIKi-->
                    <div class="card accordian-card clearfix">
                      <div class="card-body">
                        <h5 class="accordian-title">TIKI</h5>
                        <div class="accordion" id="accordionExample">
                          <?php if (!empty($tiki)) : ?>
                            <?php foreach ($tiki['costs'] as $t) : ?>
                              <!-- Single Accordian-->
                              <div class="accordian-header" id="headingOne">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-toggle="collapse" data-target="#collapseTwo<?= $t['service']; ?>" aria-expanded="false" aria-controls="collapseOne">
                                  <span><i class="lni lni-dollar"></i><?= "PAKET " . $t['service']; ?></span><i class="lni-chevron-right"></i>
                                </button>
                              </div>
                              <div class="collapse" id="collapseTwo<?= $t['service']; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <p>
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="radioTwo<?= $t['service']; ?>" value="<?= $t['cost'][0]['value']; ?>" onclick="getongkir('TIKI - <?= $t['service']; ?>','<?= $t['cost'][0]['value']; ?>')">
                                  <label class="form-check-label" for="radioTwo<?= $t['service']; ?>">
                                    <?= "Rp. " . $t['cost'][0]['value'] . " - Estimated (" . $t['cost'][0]['etd'] . " hari)"; ?>
                                  </label>
                                </p>
                              </div>
                          <?php endforeach;
                          endif; ?>
                        </div>
                      </div>
                    </div>
                    <br>
                  </li>
                  <li>
                    <!-- POS-->
                    <div class="card accordian-card clearfix">
                      <div class="card-body">
                        <h5 class="accordian-title">POS</h5>
                        <div class="accordion" id="accordionExample">
                          <?php if (!empty($pos)) : ?>
                            <?php foreach ($pos['costs'] as $p) : ?>
                              <!-- Single Accordian-->
                              <div class="accordian-header" id="headingOne">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-toggle="collapse" data-target="#collapseThree<?= $p['cost'][0]['value']; ?>" aria-expanded="false" aria-controls="collapseOne">
                                  <span><i class="lni lni-dollar"></i><?= " " . $p['service']; ?></span><i class="lni-chevron-right"></i>
                                </button>
                              </div>
                              <div class="collapse" id="collapseThree<?= $p['cost'][0]['value']; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <p>
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="radioThree<?= $p['cost'][0]['value']; ?>" value="<?= $p['cost'][0]['value']; ?>" onclick="getongkir('POS - <?= $p['service']; ?>','<?= $p['cost'][0]['value']; ?>')">
                                  <label class="form-check-label" for="radioThree<?= $p['cost'][0]['value']; ?>">
                                    <?= "Rp. " . $p['cost'][0]['value'] . " - Estimated (" . $p['cost'][0]['etd'] . ")"; ?>
                                  </label>
                                </p>
                              </div>
                          <?php endforeach;
                          endif; ?>
                        </div>
                      </div>
                    </div>
                    <br>
                  </li>
                  <li>
                    <!-- COD-->
                    <div class="card accordian-card clearfix">
                      <div class="card-body">
                        <h5 class="accordian-title">COD</h5>
                        <div class="accordion" id="accordionExample">
                          <!-- Single Accordian-->
                          <div class="accordian-header" id="headingOne">
                            <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                              <span><i class="lni lni-dollar"></i>Cash On Delivery</span><i class="lni-chevron-right"></i>
                            </button>
                          </div>
                          <div class="collapse" id="collapseFour" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p>
                              <input class="form-check-input" type="radio" name="exampleRadios" id="radioFour" value="COD" onclick="getongkir('COD','0')">
                              <label class="form-check-label" for="radioFour">
                                Cash On Delivery - Anda akan kami konfirmasi untuk Cash On Delivery
                              </label>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php
      } ?>
      <input type="hidden" name="jasa" id="jasa" value="">
      <input type="hidden" name="ongkirnya" id="ongkirnya" value="">
      <input type="hidden" name="totalnya" id="totalnya" value="<?= $total_harga; ?>">
      <input type="hidden" name="totalsemua" id="totalsemua" value="">

      <!-- Cart Amount Area-->
      <div class="card cart-amount-area">
        <div class="card-body d-flex align-items-center justify-content-between">
          <h5 class="total-price mb-0">
            Rp <span id="totalsemuahtml"><?= number_format($total_harga, 0, ',', '.'); ?></span>
          </h5>
          <a class="btn btn-warning" onclick="validasicheckout()" href="#">Confirm &amp; Pay</a>
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