<?php include 'cek_session.php';
include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
  <!-- main content -->
  <div id="contentwrapper">
      <div class="main_content">

          <nav>
              <div id="jCrumbs" class="breadCrumb module">
                  <ul>
                      <li>
                          <a href="?page=2"><i class="icon-home"></i></a>
                      </li>
                      <li>
                          <a href="#">Member</a>
                      </li>
                      <li>
                          List BET
                      </li>
                  </ul>
              </div>
          </nav>

          <div class="row-fluid">
              <div class="span12">
                  <h3 class="heading">List BET</h3>
                  <table class="table table-striped table-bordered dTableR" id="dt_a">
                      <thead>
                          <tr>
														<th>No.</th>
														<th>Bet</th>
														<th>Jumlah Bet</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php
                        if(isset($_GET['time'])){
                            $query = "SELECT bet, sum(jumlah_bet) AS jumlah_bet FROM tb_bet WHERE id_permainan = (SELECT MAX(id_permainan) FROM tb_permainan) AND username_member='$_SESSION[username]' AND DATE(time_bet) ='$_GET[time]' GROUP BY bet";
                        }else{
                            $query = "SELECT bet, sum(jumlah_bet) AS jumlah_bet FROM tb_bet WHERE id_permainan = (SELECT MAX(id_permainan) FROM tb_permainan) AND username_member='$_SESSION[username]' GROUP BY bet";
                        }
                      	$sql = mysqli_query($conn, $query);
                      	$a = 1;
                      	while($row = mysqli_fetch_array($sql)){
                      		echo "<tr>";
                          echo "<td>".$a."</td>";
													echo "<td>".$row['bet']."</td>";
													echo "<td>".$row['jumlah_bet']."</td>";
                      		echo "</tr>";
                      		$a++;
                      	}
                      	?>

                      </tbody>
                  </table>
              </div>
          </div>
          <?php include('BET.php') ?>


      </div>
  </div>
</body>
</html>
