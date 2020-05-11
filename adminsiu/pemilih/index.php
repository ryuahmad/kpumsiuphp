<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

   include('./pemilih/list.php');


?>
