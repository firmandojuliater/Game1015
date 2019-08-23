<?php include '../koneksi.php';
include 'cek_session.php'; ?>
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
					<table class="table table-striped table-bordered dTableR" id="dt_a">
						<thead>
							<tr>
								<th>No.</th>
								<th>Username</th>
								<th>Name</th>
								<th>Diskon 2d</th>
								<th>Diskon 3d</th>
								<th>Diskon 4d</th>
								<th>Diskon Shio</th>
								<th>Pajak BK/GG</th>
								<th>Diskon CB</th>
								<th>Diskon CJ</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php

							$query = "SELECT * FROM tb_user WHERE hak_akses != 'Master Agent'";
							$sql = mysqli_query($conn, $query);
							$a = 1;
							while ($row = mysqli_fetch_array($sql)) {
								echo "<tr>";
								echo "<td>" . $a . "</td>";
								echo "<td>" . $row['username'] . "</td>";
								echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
								echo "<td>" . $row['diskon_2d'] . "</td>";
								echo "<td>" . $row['diskon_3d'] . "</td>";
								echo "<td>" . $row['diskon_4d'] . "</td>";
								echo "<td>" . $row['diskon_shio'] . "</td>";
								echo "<td>" . $row['pajak_bkgg'] . "</td>";
								echo "<td>" . $row['diskon_cb'] . "</td>";
								//echo "<td>".$row['diskon_cm']."</td>";
								//echo "<td>".$row['hadiah_cm']."</td>";
								echo "<td>" . $row['diskon_cj'] . "</td>";
								//echo "<td>".$row['diskon_cn']."</td>";
								//echo "<td>".$row['hadiah_cn']."</td>";
								//echo "<td>".$row['diskon_gp']."</td>";
								//echo "<td>".$row['hadiah_gp']."</td>";
								echo "
                          <td>
                          <a href='#edit_diskon_" . $row['username'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
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
					<table class="table table-striped table-bordered dTableR" id="dt_f">
						<thead>
							<tr>
								<th>No.</th>
								<th>Username</th>
								<th>Name</th>
								<th>Hadiah 2d</th>
								<th>Hadiah 3d</th>
								<th>Hadiah 4d</th>
								<th>Hadiah Shio</th>
								<th>Pajak BK/GG</th>
								<th>Hadiah BK/GG</th>
								<th>Hadiah CB</th>
								<th>Hadiah CJ</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php

							$query = "SELECT * FROM tb_user WHERE hak_akses != 'Master Agent'";
							$sql = mysqli_query($conn, $query);
							$a = 1;
							while ($row = mysqli_fetch_array($sql)) {
								echo "<tr>";
								echo "<td>" . $a . "</td>";
								echo "<td>" . $row['username'] . "</td>";
								echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
								echo "<td>" . $row['hadiah_2d'] . "</td>";
								echo "<td>" . $row['hadiah_3d'] . "</td>";
								echo "<td>" . $row['hadiah_4d'] . "</td>";
								echo "<td>" . $row['hadiah_shio'] . "</td>";
								echo "<td>" . $row['pajak_bkgg'] . "</td>";
								echo "<td>" . $row['hadiah_bkgg'] . "</td>";
								echo "<td>" . $row['hadiah_cb'] . "</td>";
								//echo "<td>".$row['diskon_cm']."</td>";
								//echo "<td>".$row['hadiah_cm']."</td>";
								echo "<td>" . $row['hadiah_cj'] . "</td>";
								//echo "<td>".$row['diskon_cn']."</td>";
								//echo "<td>".$row['hadiah_cn']."</td>";
								//echo "<td>".$row['diskon_gp']."</td>";
								//echo "<td>".$row['hadiah_gp']."</td>";
								echo "
                          <td>
                          <a href='#edit_hadiah_" . $row['username'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
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