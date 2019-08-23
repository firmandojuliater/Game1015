<?php include '../koneksi.php';
include 'cek_session.php';
?>
<html>
<head>
	<title>DISKON & HADIAH</title>
</head>
<body>
	<h1>DISKON & HADIAH</h1>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Name</th>
			<th>Diskon 2d</th>
			<th>Hadiah 2d</th>
			<th>Diskon 3d</th>
			<th>Hadiah 3d</th>
			<th>Diskon 4d</th>
			<th>Hadiah 4d</th>
			<th>Diskon Shio</th>
			<th>Hadiah Shio</th>
			<th>Diskon BK/GG</th>
			<th>Hadiah BK/GG</th>
			<th>Diskon CB</th>
			<th>Hadiah CB</th>
			<th>Diskon CM</th>
			<th>Hadiah CM/GG</th>
			<th>Diskon CJ</th>
			<th>Hadiah CJ</th>
			<th>Diskon CN</th>
			<th>Hadiah CN</th>
			<th>Diskon GP</th>
			<th>Hadiah GP</th>
			<th>Aksi</th>
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
		echo "<td>".$row['diskon_2d']."</td>";
		echo "<td>".$row['hadiah_2d']."</td>";
		echo "<td>".$row['diskon_3d']."</td>";
		echo "<td>".$row['hadiah_3d']."</td>";
		echo "<td>".$row['diskon_4d']."</td>";
		echo "<td>".$row['hadiah_4d']."</td>";
		echo "<td>".$row['diskon_shio']."</td>";
		echo "<td>".$row['hadiah_shio']."</td>";
		echo "<td>".$row['diskon_bkgg']."</td>";
		echo "<td>".$row['hadiah_bkgg']."</td>";
		echo "<td>".$row['diskon_cb']."</td>";
		echo "<td>".$row['hadiah_cb']."</td>";
		echo "<td>".$row['diskon_cm']."</td>";
		echo "<td>".$row['hadiah_cm']."</td>";
		echo "<td>".$row['diskon_cj']."</td>";
		echo "<td>".$row['hadiah_cj']."</td>";
		echo "<td>".$row['diskon_cn']."</td>";
		echo "<td>".$row['hadiah_cn']."</td>";
		echo "<td>".$row['diskon_gp']."</td>";
		echo "<td>".$row['hadiah_gp']."</td>";
		echo "<td><a href='ubah_diskon_kredit.php?username=".$row['username']."'>Ubah</a></td>";
		echo "</tr>";
		$a++;
	}
	?>
	</table>
	<a href="index.php">Kembali ke halaman awal</a>
</body>
</html>
