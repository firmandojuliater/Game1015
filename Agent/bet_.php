<?php include '../koneksi.php'; 
include 'cek_session.php';
?>
<html>
<head>
	<title>BET</title>
</head>
<body>
	<h1>BET</h1>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Name</th>
			<th>Min Bet</th>
			<th>Max Bet</th>
			<th>Max Bet 2d</th>
			<th>Max Bet 3d</th>
			<th>Max Bet 4d</th>
			<th>Max Bet Other</th>
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
		echo "<td>".$row['min_bet']."</td>";
		echo "<td>".$row['max_bet']."</td>";
		echo "<td>".$row['max_bet_2d']."</td>";
		echo "<td>".$row['max_bet_3d']."</td>";
		echo "<td>".$row['max_bet_4d']."</td>";
		echo "<td>".$row['max_bet_other']."</td>";
		echo "<td><a href='ubah_bet.php?username=".$row['username']."'>Ubah</a></td>";
		echo "<td><a href='hapus_bet.php?username=".$row['username']."'>Hapus</a></td>";
		echo "</tr>";
		$a++;
	}
	?>
	</table>
	<a href="index.php">Kembali ke halaman awal</a>
</body>
</html>