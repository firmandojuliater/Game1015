<?php include '../koneksi.php';
include 'cek_session.php';
?>
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
                          <a href="#">Agent</a>
                      </li>
                      <li>
                          List Agent & Member
                      </li>
                  </ul>
              </div>
          </nav>

          <div class="row-fluid">
              <div class="span12">
                  <h3 class="heading">List Agent & Member</h3>
                  <table class="table table-striped table-bordered dTableR" id="dt_a">
                      <thead>
                          <tr>
														<th>No.</th>
														<th>Username</th>
														<th>Name</th>
														<th>Phone / Mobile</th>
														<th>Last Login</th>
														<th>Status</th>
														<th>Is Logged</th>
                            <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php

                      	$query = "SELECT * FROM tb_user WHERE hak_akses = 'Agent'";
                      	$sql = mysqli_query($conn, $query);
                      	$a = 1;
                      	while($row = mysqli_fetch_array($sql)){
                      		echo "<tr>";
                      		echo "<td>".$a."</td>";
													echo "<td>".$row['username']."</td>";
													echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
													echo "<td>".$row['phone']." / ".$row['mobile']."</td>";
													echo "<td>".$row['last_login']."</td>";
													echo "<td>".$row['status']."</td>";
													echo "<td>".$row['is_logged']."</td>";
                      		echo "
                          <td>
                          <a href='#edit_".$row['username']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                          <a href='hapus_user.php?username=".$row['username']."' class='btn btn-danger btn-sm' ><span class='glyphicon glyphicon-trash'></span> Delete</a>
                          </td>";
                      		echo "</tr>";
                      		$a++;
                          include('ubah_user.php');
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
