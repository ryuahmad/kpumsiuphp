<?php
if (isset($_POST['add_kelas'])) {

   $id      = $_POST['id'];
   $kelas   = $_POST['kelas'];

   if ($id == null || $kelas == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {
       
        // $id = mysqli_query($con, "SELECT id_kelas FROM t_kelas");

        // if (mysqli_num_rows($id) > 0) {
        //   echo '<script type="text/javascript">alert("Id Kelas Sudah Terpakai");window.history.go(-1);</script>';
        // } else {

           
        // }
        
        $sql = $con->prepare("INSERT INTO t_kelas(id_kelas, nama_kelas) VALUES ( ?, ?)");
           $sql->bind_param('ss', $id, $kelas);
           $sql->execute();
        
           header('location:?page=kelas');
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
                <label>Id Kelas</label>
                <input class="form-control" type="text" name="id" placeholder="Id Kelas" />
            </div>

            <div class="form-group">
                <label>Nama Kelas</label>
                <input class="form-control" name="kelas" type="text" placeholder="Nama Kelas" />
            </div>

            <div class="form-group">
                <button type="submit" name="add_kelas" value="Tambah Kelas" class="btn btn-success">
                    Tambah Kelas
                </button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    Kembali
                </button>
            </div>

        </form>
    </div>
</div>
