<?php
include '../koneksi.php';
include 'cek_session.php';
	
	$username = $_POST['username'];
	$credit = $_POST['credit'];
	$credit1 = $_POST['credit1'];
	$tambah_kredit = $credit + $credit1;
	
	
	$sql = "UPDATE tb_user SET 
				credit = '$tambah_kredit'
			WHERE username='$username'";
    $query = mysqli_query($conn, $sql);

	if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: credit.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
?>











