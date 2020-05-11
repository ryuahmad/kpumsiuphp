<?php
define('BASEPATH', dirname(__FILE__));
session_start();

if (isset($_SESSION['siswa'])) {
   header('location:./vote.php');
}

if (isset($_POST['submit'])) {

   require('include/connection.php');

   $nim     = $_POST['nim'];
   $name    = $_POST['fullname'];
   $thn     = date('Y');
   $dpn     = date('Y') + 1;
   $periode = $thn.'/'.$dpn;
   
   $cek = $con->prepare("SELECT * FROM t_pemilih WHERE nim = ? && periode = ?") or die($con->error);
   $cek->bind_param('ss', $nim, $periode);
   $cek->execute();
   $cek->store_result();
   
   

   if ($cek->num_rows() > 0) {

      echo '<script type="text/javascript">alert("Anda sudah memberikan suara");</script>';

   } else {

      $sql = $con->prepare("SELECT * FROM t_user WHERE id_user = ? && fullname = ? && pemilih = 'Y'") or die($con->error);
      $sql->bind_param('ss', $nim, $name);
      $sql->execute();
      $sql->store_result();

      if ($sql->num_rows() > 0 ) {
         $sql->bind_result($id, $user, $kelas, $jk, $pemilih, $level);
         $sql->fetch();

         $_SESSION['siswa'] = $id;

         header('location:./vote.php');

      } else {

         echo '<script type="text/javascript">alert("Anda tidak berhak memberikan suara. NIM/NIDN/NIK Anda belum terdaftar atau salah");</script>';

      }

   }
}

?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>E - Voting</title>
            <!-- Icon -->
            <link rel="shortcut icon" type="image/icon" href="./favicon.ico">
            <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="./assets/css/custom.css"/>
            <style type="text/css">
                  #content-slider {
                  position: relative;
                  width: 400px;
                  height: 300px;
                  overflow: hidden;
                  }
                  #content-slider img {
                  display: block;
                  width: 100%;
                  height: auto;
                  }
                  .img-thanks {
                        max-width: 200px;
                        width: 100%;
                        max-height: 250px;
                  }
            </style>
      </head>
      <body>
            <div class="container">
                  <div class="row">
                        <div class="col-md-12">
                        <?php
                        if (isset($_GET['page'])) {
                        switch ($_GET['page']) {
                              case 'thanks':
                              include('./thanks.php');
                              break;
                              
                              case 'thanksregist':
                              include('./thanksregist.php');
                              break;

                              default:
                              include('./form.php');
                              break;
                        }
                        } else {
                        include('./form.php');
                        }
                        ?>

                              <footer>
                                    <?php echo date('Y'); ?> &copy; KPUM SIU
                              </footer>
                        </div>
                  </div>
            </div>
            <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="./assets/js/jquery-cycle.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
            $('#content-slider').cycle({
                  fx: 'fade',
                  speed: 1000,
                  timeout: 500
            });
            });
            </script>
      </body>
</html>
