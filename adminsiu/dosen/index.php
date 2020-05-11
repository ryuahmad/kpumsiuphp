<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./dosen/add.php');
         break;

      case 'edit':
         include('./dosen/edit.php');
         break;

      case 'hapus':

         if (isset($_GET['id'])) {

            $nidn   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql   = $con->prepare("DELETE FROM t_user WHERE id_user = ?");
            $sql->bind_param('s', $nidn);
            $sql->execute();

            header('location: ?page=dosen');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./dosen/list.php');
         break;
   }

} else {

   include('./dosen/list.php');

}
?>
