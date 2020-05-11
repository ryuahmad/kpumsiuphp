<?php
define('BASEPATH', dirname(__FILE__));

session_start();
if(!isset($_SESSION['id_admin'])) {

   header('location:../');

}

if (isset($_POST['update'])) {
   //include file koneksi
   include('../../include/connection.php');
   //tampung data dari form
   $id    = strip_tags(mysqli_real_escape_string($con, $_POST['id']));
   $jbt = strip_tags(mysqli_real_escape_string($con, $_POST['jabatan']));

   if ($jbt == null) {

      echo '<script type="text/javascript">alert("Form Harus terisi");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("UPDATE t_jabatan SET nm_jabatan = ? WHERE id_jabatan = ?");
      $sql->bind_param('ss', $jbt, $id);
      $sql->execute();

      header('location:../dashboard.php?page=jabatan');

   }

} else {

   header('location:../dashboard.php');

}
