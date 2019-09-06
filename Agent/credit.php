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
                          Credit Member
                      </li>
                  </ul>
              </div>
          </nav>

          <div class="row-fluid">
              <div class="span12">
                  <h3 class="heading">Credit Member</h3>
                  <table class="table table-striped table-bordered dTableR" id="dt_a">
                      <thead>
                          <tr>
                            <th>No.</th>
                      			<th>Username</th>
                      			<th>Name</th>
                      			<th>Credit</th>
                      			<th>Used Credit</th>
                      			<th>Market</th>
                      			<th>Member</th>
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
                      		echo "<td>".$row['credit']."</td>";
                      		echo "<td>".$row['used_credit']."</td>";
                      		echo "<td>".$row['market']."</td>";
                      		echo "<td>".$row['member']."</td>";
                      		echo "
                          <td>
                          <a href='#tambah_".$row['username']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Tambah</a>
                          <a href='#kurang_".$row['username']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Kurang</a>
                          </td>";
                      		echo "</tr>";
                              $a++;
                              include('tambah_kurang_credit.php');
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
