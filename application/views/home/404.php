<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
  <!-- Title-->
  <title>404 Page Not Found</title>
  <!-- Favicon-->
  <link rel="icon" href="<?= base_url('assets/'); ?>img/core-img/fav_toktek.png" />
  <!-- Stylesheet-->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>style.css" />
  <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <div class="container">
      <div class="px-4">
        <!-- Check-->
        <div class="success-check"><i class="lni lni-emoji-sad"></i></div>
        <p class="text-white mt-4 mb-0">
          404 Page Not Found
        </p>
        <p class="text-white mb-0">
          The Page you are looking for is doesn't exist or an other error occurred. Go back, or head over to <?= base_url(); ?> to choose a new direction
        </p>
        <a class="go-back-btn" href="<?= base_url(); ?>"><i class="lni-close"></i></a>
      </div>
    </div>
  </div>
  <?php
  $this->load->view('_partials/js');
  ?>
</body>

</html>