<?php

$hitung = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_user WHERE level ='mahasiswa' "));
$total  = $hitung;

$hitung2 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_user WHERE level ='dosen' "));
$total2  = $hitung2;

$hitung3 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_pemilih JOIN t_user ON t_pemilih.nim = t_user.id_user WHERE level = 'mahasiswa'"));
$total3  = $hitung3;

$hitung4 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_pemilih JOIN t_user ON t_pemilih.nim = t_user.id_user WHERE level = 'dosen'"));
$total4  = $hitung4;

$hitung5 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_pemilih WHERE id_paslon = 11"));
$total5  = $hitung5;

?>

<div class="welcome">
   <h2>Selamat Datang di KPUM SIU</h2>
   <p style="font-size:18px;">Anda login sebagai <strong><?php echo $_SESSION['user']; ?></strong> dengan hak akses terbatas</p>
</div>

<hr />

<div class="row">
    
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $total; ?></h3>
        
            <p>Mahasiswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="./dashboard.php?page=user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $total2; ?></h3>
        
            <p>Manajemen/Dosen</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="./dashboard.php?page=dosen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $total3; ?></h3>
        
            <p>Pemilih Mahasiswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="./dashboard.php?page=pemilih" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $total4; ?></h3>
        
            <p>Pemilih Manajemen/Dosen</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="./dashboard.php?page=pemilihdosen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>