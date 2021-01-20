<?php
$this->load->view('_partials/metatag');
$this->load->view('_partials/header');
$this->load->view('_partials/sidebar');
?>
<div class="page-content-wrapper">
  <div class="container">
    <!-- Profile Wrapper-->
    <div class="profile-wrapper-area py-3">
      <!-- User Information-->
      <div class="card user-info-card">
        <div class="card-body p-2 d-flex align-items-center">
          <div class="user-info">
            <p class="mb-0 text-white text-center">Input Product</p>

          </div>
        </div>
      </div>
      <!-- User Meta Data-->
      <div class="card user-data-card">
        <div class="card-body">
          <?php if (isset($error)) {
            echo "
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <div class='card user-data-card'>
              <div class='card-body'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Error !!</strong>" . $error . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
";
          }; ?>
          <?php if (isset($alert)) {
            echo $alert;
          } ?>
          <?php echo form_open_multipart('proses/upload_product'); ?>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni lni-book"></i><span>Nama Product</span>
            </div>
            <input class=" form-control" type="text" name="nama" placeholder="Nama Product" required autofocus>
          </div>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni lni-construction"></i><span>Category Product</span>
            </div>
            <select class="form-control" name="category">
              <?php
              foreach ($category as $cat) {
                echo "
               <option value='$cat->id'><i class='lni $cat->icon'>$cat->nama</i> </option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni lni-italic"></i><span>Deskripsi</span>
            </div>
            <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" required></textarea>
          </div>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni-camera"></i><span>Foto Product</span>
            </div>
            <input class="form-control" type="file" name="image" id="image" accept="image/*" required />
          </div>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni lni-stackoverflow"></i><span>Stok Product</span>
            </div>
            <input class="form-control" type="number" name="stok" placeholder="Stok Product" required />
          </div>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni lni-weight"></i><span>Berat</span>
            </div>
            <input class="form-control" type="number" name="berat" placeholder="Berat Product" required />
          </div>
          <div class="form-group">
            <div class="title mb-2">
              <i class="lni lni-tag"></i><span>Harga</span>
            </div>
            <input class="form-control" type="number" name="harga" placeholder="Harga Product" required />
          </div>
          <div class="form-group">
            <div id="uploaded_image"></div>
          </div>
          <button class="btn btn-primary w-100" type="submit">
            Upload Product
          </button>
          </form>
        </div>
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