<!-- Modal -->
<div class="modal fade" id="connectionmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Connection Problem</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        Connection lost... trying to fix your connection
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editprofile" data-backdrop="static" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <div class="container">
          <!-- Profile Wrapper-->
          <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
              <div class="card-body p-4 d-flex align-items-center">
                <div class="user-info">
                  <p class="mb-0 text-white">Silahkan isi data ini untuk proses lebih lanjut... </p>
                  <h5 class="mb-0"><?= $header; ?></h5>
                </div>
              </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
              <div class="card-body">
                <form action="<?= base_url('proses/saveuser'); ?>" method="POST">
                  <div class="form-group">
                    <div class="title mb-2">
                      <i class="lni-user"></i><span>Nama</span>
                    </div>
                    <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama lengkap ..." required autofocus />
                  </div>
                  <div class="form-group">
                    <div class="title mb-2">
                      <i class="lni-envelope"></i><span>Email Address</span>
                    </div>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email..." required />
                  </div>
                  <div class="form-group">
                    <div class="title mb-2">
                      <i class="lni-phone-handset"></i><span>Phone</span>
                    </div>
                    <input class="form-control" type="number" id="phone" name="phone" placeholder="62823......" required />
                  </div>
                  <div class="form-group">
                    <div class="title mb-2">
                      <i class="lni-map-marker"></i><span>Alamat</span>
                    </div>
                    <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Alamat..." required />
                  </div>
                  <div class="form-group">
                    <div class="title mb-2">
                      <i class="lni-map-marker"></i><span>Kota / Kabupaten (Pastikan di isi)</span>
                    </div>
                    <select id="select2insidemodal" class="form-control" name="kabupaten" style="width: 100%;">
                      <?php foreach ($listkabupaten->rajaongkir->results as $city) {
                        echo "<option value='$city->city_id'>$city->city_name - $city->type</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <button class="id_save btn btn-success w-100 btn-sm btn-block" type="submit">
                    <span class="fa fa-paper-plane-o"></span>
                    Save All Changes
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>