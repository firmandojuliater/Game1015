<?php include '../koneksi.php'; 
include 'cek_session.php';
?>
<html>
<head>
	<title>CREDIT</title>
</head>
<body>
	<h1>CREDIT</h1>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Name</th>
			<th>Credit</th>
			<th>Used Credit</th>
			<th>Market</th>
			<th>Member</th>
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
		echo "<td>".$row['credit']."</td>";
		echo "<td>".$row['used_credit']."</td>";
		echo "<td>".$row['market']."</td>";
		echo "<td>".$row['member']."</td>";
		echo "<td><a href='tambah_credit.php?username=".$row['username']."'>Tambah</a></td>";
		echo "<td><a href='kurang_credit.php?username=".$row['username']."'>Kurang</a></td>";
		echo "</tr>";
		$a++;
	}
	
	?>
	</table>
	<a href="index.php">Kembali ke halaman awal</a>
</body>
</html>