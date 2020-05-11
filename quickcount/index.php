<?php
ob_start();

define('BASEPATH', dirname(__FILE__));

include('../include/connection.php');
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>E - Voting | QuickCount</title>
            <!-- Icon -->
            <link rel="shortcut icon" type="image/icon" href="../favicon.ico">
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="../assets/css/custom.css"/>
            <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
            <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
            <style type="text/css">
                  #content-slider {
                  position: relative;
                  width: 400px;
                  height: 300px;
                  overflow: hidden;
                  }
                  #content-slider img {
                  display: block;
                  width: 100%;
                  height: auto;
                  }
                  .img-thanks {
                        max-width: 200px;
                        width: 100%;
                        max-height: 250px;
                  }
            </style>
      </head>
      <body>
            <div class="container">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <?php
                                
                                include('./perolehan.php');
                                
                                ?>
                            </div>
                        </div>
                        <footer>
                            <?php echo date('Y'); ?> &copy; KPUM SIU
                        </footer>
                  </div>
            </div>
            
            <!-- jQuery 2.2.3 -->
            <script src="../assets/js/jquery-2.2.3.min.js"></script>
            <!-- Bootstrap 3.3.6 -->
            <script src="../assets/js/bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../assets/js/app.min.js"></script>
            <script type="text/javascript" src="./assets/js/jquery-cycle.min.js"></script>
            
            <script type="text/javascript" src="../assets/js/chart-bundle.js"></script>
            <script type="text/javascript" src="../assets/js/utils.js"></script>
            <script type="text/javascript" src="../assets/js/FileSaver.min.js"></script>
            <script type="text/javascript" src="../assets/js/canvas-toBlob.js"></script>
            
            <script type="text/javascript">
            $(document).ready(function() {
            $('#content-slider').cycle({
                  fx: 'fade',
                  speed: 1000,
                  timeout: 500
            });
            });
            
            //perolehan
            <?php
            
              $thn = date('Y');
              $dpn = date('Y') + 1;
              $periode = $thn.'/'.$dpn;
              $kan = $con->prepare("SELECT * FROM t_paslon WHERE periode = ?") or die($con->error);
              $kan->bind_param('s', $periode);
              $kan->execute();
              $kan->store_result();
              $numb = $kan->num_rows();
              $label = '';
              $data = '';
              for ($i = 1; $i <= $numb; $i++) {
                  $kan->bind_result($id, $nama, $foto, $visi, $misi, $vote, $kandidat);
                  $kan->fetch();
                  $label .= "'".$nama."',";
                  $data .= $vote.',';
              }
              $labels = trim($label, ',');
              $datas  = trim($data, ',');
            ?>
            var chartData = {
              labels: [
                  <?php
                  echo $labels;
                  ?>
              ],
                datasets: [{
                  type: 'bar',
                  label: 'Jumlah Suara',
                  borderColor: window.chartColors.green,
                  backgroundColor: [
                    window.chartColors.blue,
                    window.chartColors.red,
                    window.chartColors.yellow,
                  ],
                  borderWidth: 2,
                  fill: false,
                  data: [
                    <?php
                    echo $datas;
                    ?>
                  ]
                }],
            };
            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myMixedChart = new Chart(ctx, {
                  type: 'bar',
                  data: chartData,
                  options: {
                        responsive: true,
                        title: {
                          display: true,
                          text: 'Quick Count KPUM SIU <?php echo date('Y'); ?>',
                          fontSize: 30
                        },
                        legend: {
                            labels: {
                                fontSize: 20
                            }
                        },
                        scales: {
                          xAxes: [{
                              ticks: {
                                  fontSize:15
                              }
                          }],
                          yAxes: [{
                              ticks: {
                                  fontSize:14,
                                  min:0
                              }
                          }]
                        }
                    }
                });
            };
            
            </script>
      </body>
</html>
