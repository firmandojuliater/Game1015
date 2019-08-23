<?php
include '../koneksi.php';


// $credit = $_POST['credit'];
$username = $_POST['username'];
$last_name = $_POST['last_name'];
$max_bet_2d = $_POST['max_bet_2d'];
$max_bet_3d = $_POST['max_bet_3d'];
$max_bet_4d = $_POST['max_bet_4d'];
$max_bet_other = $_POST['max_bet_other'];

$sql = "UPDATE tb_user SET
			last_name = '$last_name',
			max_bet_2d = '$max_bet_2d',
			max_bet_3d = '$max_bet_3d', max_bet_4d ='$max_bet_4d',
			max_bet_other ='$max_bet_other'
		WHERE username='$username'";
$query = mysqli_query($conn, $sql);

if( $query ) {
// kalau berhasil alihkan ke halaman list-siswa.php
header('Location: index.php?page=bet');
} else {
// kalau gagal tampilkan pesan
die("Gagal menyimpan perubahan...");
}
