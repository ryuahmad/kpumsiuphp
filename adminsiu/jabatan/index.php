<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./jabatan/add.php');
         break;

      case 'edit':
         include('./jabatan/edit.php');
         break;

      case 'hapus':

         if (isset($_GET['id'])) {

            $id_jabatan   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql        = $con->prepare("DELETE FROM t_jabatan WHERE id_jabatan = ?");
            $sql->bind_param('s', $id_jabatan);
            $sql->execute();

            header('location: ?page=jabatan');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./jabatan/list.php');
         break;
   }

} else {

   include('./jabatan/list.php');

}
?>
