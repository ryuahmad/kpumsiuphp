<?php
session_start();
if(!isset($_SESSION['siswa']) || !isset($_GET['id'])) {
   header('location:./');
}

define('BASEPATH', dirname(__FILE__));

require('./include/connection.php');

$thn     = date('Y');
$dpn     = date('Y') + 1;
$periode = $thn.'/'.$dpn;
$vote   = $_GET['s'] + 1;

// update suara
$update  = $con->prepare("UPDATE t_paslon SET vote = ? WHERE id_paslon = ?") or die($con->error);
$update->bind_param('is', $vote, $_GET['id']);
$update->execute();

//simpan data pemilih
$save = $con->prepare("INSERT INTO t_pemilih(nim, periode, id_paslon) VALUES(?,?,?)") or die($con->error);
$save->bind_param('ss', $_SESSION['siswa'], $periode, $_GET['id']);
$save->execute();

unset($_SESSION['siswa']);

header('location:./index.php?page=thanks');
?>
