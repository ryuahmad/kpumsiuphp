<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Daftar Pemilih</h3>
   </div>
   
   <div style="clear:both"></div>
   <hr />
   <div class="col-md-10 col-sm-12">
      <table class="table table-striped table-hover">
            <thead>
                  <tr>
                  <th style="text-align:center;">No.</th>
                  <th style="text-align:center;">NIM</th>
                  <th style="text-align:center;">Nama Mahasiswa</th>
                  <th style="text-align:center">Kelas</th>
                  <th width="130px" style="text-align:center;">Jenis Kelamin</th>
                  <th width="130px" style="text-align:center;">Periode</th>
                  <th style="text-align:center;">Pilihan Paslon</th>
            </thead>
            <tbody>
                  <?php
                  require('../include/connection.php');

                  if (isset($_GET['hlm'])) {
                              $hlm = $_GET['hlm'];
                              $no  = (100*$hlm) - 99;
                        } else {
                              $hlm = 1;
                              $no  = 1;
                        }
                  $start  = ($hlm - 1) * 100;

                  $sql = mysqli_query($con, "SELECT * FROM t_pemilih JOIN t_user ON t_pemilih.nim = t_user.id_user WHERE level = 'mahasiswa' LIMIT $start,100");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['id_user']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['fullname']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['id_kelas']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php
                              if($data['jk'] == 'L') {
                                    echo 'Laki - laki';
                              } else {
                                    echo 'Perempuan';
                              }
                              ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['periode']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['id_paslon']; ?>
                        </td>
                        
                        </tr>
                        <?php
                  }

                  } else {

                  echo "<tr>
                              <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>
            </tbody>
      </table>
      <?php
      echo '<ul class="pagination">';
         if($hlm > 1){ //start if
            $hlmn = $hlm - 1;
      ?>
            <li class="waves-effect">
               <a href="?page=pemilih&hlm=<?php  echo $hlmn; ?>">
                  <i class='fa fa-caret-left'></i> Prev
               </a>
            </li>
      <?php
         }		//end if $hlm > 1


         $hitung = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_pemilih JOIN t_user ON t_pemilih.nim = t_user.id_user WHERE level = 'mahasiswa'"));

         $total  = ceil($hitung / 100);
         for ($i = 1; $i <= $total ; $i++) { //start for
      ?>
            <li <?php if ($hlm != $i) { echo 'class="waves-effect"'; } else { echo 'class="active"'; } ?>>
               <a href="?page=pemilih&hlm=<?php  echo $i; ?>">
                  <?php  echo $i; ?>
               </a>
            </li>
         <?php
         } // end for

         if ($hlm < $total) { //start if $hlm < $total
            $next = $hlm + 1;
         ?>
            <li class="waves-effect">
               <a href="?page=pemilih&hlm=<?php  echo $next; ?>">
                  Next <i class='fa fa-caret-right'></i>
               </a>
            </li>
         <?php
         }	//end if $hlm < $total

      echo '</ul>';	//end pagination
      ?>
      </div>
</div>
