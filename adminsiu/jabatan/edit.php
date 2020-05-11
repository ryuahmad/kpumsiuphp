<?php
if(!isset($_SESSION['id_admin']) && !isset($_GET['id'])) {
   header('location: ../');
}
$id = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql = $con->prepare("SELECT * FROM t_jabatan WHERE id_jabatan = ?");
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$num = $sql->num_rows();
$sql->bind_result($idj, $jbt);
$sql->fetch();

if ($num > 0) {
?>
<h3>Update Kelas</h3>
<hr />
<div class="row">
    <div class="col-md-4">

        <form action="./jabatan/update.php" method="post">
            
            <div class="form-group">
                <label>Nama Jabatan</label>
                <input class="form-control" type="hidden" name="id" readonly value="<?php echo $idj; ?>" />
                <input class="form-control" name="jabatan" type="text" placeholder="Nama Jabatan" value="<?php echo $jbt; ?>"/>
            </div>

            <div class="form-group">
                <button type="submit" name="update" value="Update" class="btn btn-success">
                    Update Jabatan
                </button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    Kembali
                </button>
            </div>
      </form>
   </div>
</div>


<?php
} else {
   header('location:?page=jabatan');
}
?>
