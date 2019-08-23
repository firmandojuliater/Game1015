<?php
include '../koneksi.php';

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];

    $sql = "UPDATE tb_user SET
				first_name = '$first_name', last_name = '$last_name',
				phone = '$phone', mobile = '$mobile'
			WHERE username='$username'";
    $query = mysqli_query($conn, $sql);

    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: index.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
	}
