<?php defined('BASEPATH') or die("No Access Allowed");?>

<h2 class="index-header">Selamat Datang di Aplikasi E - Voting<br />KPUM SIU</h2>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <div id="content-slider">
            <img src="./assets/img/KPUMSIU_new.png" class="img" alt="Slideshow 1" >
            <img src="./assets/img/BEMSIU.png" class="img" alt="Slideshow 2" >
            <img src="./assets/img/IU.png" class="img" alt="Slideshow 3" >
        </div>
    </div>
    <div class="col-md-6 form">
        <span class="info-login">Silahkan Login untuk dapat melakukan pemilihan</span>
        <br />
        <br />
        <form action="" method="post">
            <div class="form-group">
                <label>NIM/NIDN/NIK :</label>
                <input type="number" class="form-control" placeholder="Masukkan NIM/NIDN/NIK Anda (ex. 201611001 tanpa tanda titik)" required="NIM" name="nim"/>
            </div>
            <div class="form-group">
                <label>Nama Lengkap :</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap Anda" required="name" name="fullname"/>
                
            </div>
            <br />
            
            
            
        </form>
    </div>
</div>

