<?php include '../koneksi.php';
include 'cek_session.php';
?>
<html>
<head>
	<title>LIST USER</title>
</head>
<body>
	<h1>LIST USER</h1>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Name</th>
			<th>Phone / Mobile</th>
			<th>Last Login</th>
			<th>Status</th>
			<th>Is Logged</th>
			<th colspan="2">Aksi</th>
		</tr>
	<?php

	$query = "SELECT * FROM tb_user WHERE created_by = '$_SESSION[username]'";
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
		echo "<td><a href='ubah_user.php?username=".$row['username']."'>Ubah</a></td>";
		<td><a href='hapus_user.php?username=".$row['username']."'>Hapus</a></td>
		echo "</tr>";
		$a++;
	}
	?>
	</table>
	<a href="index.php">Kembali ke halaman awal</a>
</body>
</html>
