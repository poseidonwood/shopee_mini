<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_notif extends CI_Model
{

  public function success($value)
  {
    return "<script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
      title: '$value'
    })
    </script>";
  }
}

/* End of file Model_db.php */
