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
                          <a href="#">Total Bet</a>
                      </li>
                      <li>
                          Diskon & Hadiah
                      </li>
                  </ul>
              </div>
          </nav>

          <div class="row-fluid">
              <div class="span12">
                  <h3 class="heading">Diskon</h3>
                  <table class="table table-striped table-condensed table-bordered" id="dt_a">
                      <thead>
                          <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>2d</th>
                            <th>3d</th>
                            <th>4d</th>
                            <th>Shio</th>
                            <th>Pajak BK/GG</th>
                            <th>CB</th>
                            <th>MK</th>
                            <th>CJ</th>
                            <th>MKTS</th>
                            <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php

                      	$query = "SELECT * FROM tb_user WHERE created_by = '$_SESSION[username]'";
                      	$sql = mysqli_query($conn, $query);
                      	$a = 1;
                      	while($row = mysqli_fetch_array($sql)){
                      		echo "<tr>";
                      		echo "<td>".$a."</td>";
                      		echo "<td>".$row['username']."</td>";
                      		echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                      		echo "<td>".$row['diskon_2d']."</td>";
                      		echo "<td>".$row['diskon_3d']."</td>";
                      		echo "<td>".$row['diskon_4d']."</td>";
                      		echo "<td>".$row['diskon_shio']."</td>";
                      		echo "<td>".$row['pajak_bkgg']."</td>";
                      		echo "<td>".$row['diskon_cb']."</td>";
                      		echo "<td>".$row['diskon_mk']."</td>";
                      		echo "<td>".$row['diskon_cj']."</td>";
                      		echo "<td>".$row['diskon_mkts']."</td>";
                          echo "<td>
                          <a href='#edit_diskon_".$row['username']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                          </td>";
                      		echo "</tr>";
                      		$a++;
                          include('ubah_diskon.php');
                      	}
                      	?>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="row-fluid">
              <div class="span12">
                  <h3 class="heading">Hadiah</h3>
                  <table class="table table-striped table-condensed table-bordered" id="dt_f">
                      <thead>
                          <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>2d</th>
                            <th>3d</th>
                            <th>4d</th>
                            <th>Shio</th>
                            <th>Pajak BK/GG</th>
                            <th>BK/GG</th>
                            <th>CB</th>
                            <th>MK</th>
                            <th>CJ</th>
                            <th>MKTS</th>
                            <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php

                      	$query = "SELECT * FROM tb_user WHERE created_by = '$_SESSION[username]'";
                      	$sql = mysqli_query($conn, $query);
                      	$a = 1;
                      	while($row = mysqli_fetch_array($sql)){
                      		echo "<tr>";
                      		echo "<td>".$a."</td>";
                      		echo "<td>".$row['username']."</td>";
                      		echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                      		echo "<td>".$row['hadiah_2d']."</td>";
                      		echo "<td>".$row['hadiah_3d']."</td>";
                      		echo "<td>".$row['hadiah_4d']."</td>";
                      		echo "<td>".$row['hadiah_shio']."</td>";
                      		echo "<td>".$row['pajak_bkgg']."</td>";
                      		echo "<td>".$row['hadiah_bkgg']."</td>";
                      		echo "<td>".$row['hadiah_cb']."</td>";
                      		echo "<td>".$row['hadiah_mk']."</td>";
                      		echo "<td>".$row['hadiah_cj']."</td>";
                      		echo "<td>".$row['hadiah_mkts']."</td>";
                          echo "<td>
                          <a href='#edit_hadiah_".$row['username']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                          </td>";
                      		echo "</tr>";
                      		$a++;
                          include('ubah_hadiah.php');
                      	}
                      	?>
                      </tbody>
                  </table>
              </div>
          </div>







      </div>
  </div>
</body>
</html>
