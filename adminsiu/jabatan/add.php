<?php
if (isset($_POST['add_jabatan'])) {

   
   $jbt   = $_POST['jabatan'];

   if ($jbt == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {
       
        // $id = mysqli_query($con, "SELECT id_kelas FROM t_kelas");

        // if (mysqli_num_rows($id) > 0) {
        //   echo '<script type="text/javascript">alert("Id Kelas Sudah Terpakai");window.history.go(-1);</script>';
        // } else {

           $sql = $con->prepare("INSERT INTO t_jabatan(id_jabatan, nm_jabatan) VALUES ( ?, ?)");
           $sql->bind_param('ss', $id, $jbt);
           $sql->execute();
        
           header('location:?page=jabatan');
        // }
   }
}

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}



?>
<h3>Tambah Kelas</h3>
<hr />
<div class="row">
    <div class="col-md-4">
        <form action="" method="post">

            <div class="form-group">
                <label>Nama Jabatan</label>
                <input class="form-control" name="jabatan" type="text" placeholder="Nama Jabatan" />
            </div>

            <div class="form-group">
                <button type="submit" name="add_jabatan" value="Tambah Jabatan" class="btn btn-success">
                    Tambah Jabatan
                </button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    Kembali
                </button>
            </div>

        </form>
    </div>
</div>
