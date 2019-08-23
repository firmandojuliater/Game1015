<?php
include '../koneksi.php';

$username = $_POST['username'];
$diskon_2d = $_POST['diskon_2d'];
$diskon_3d = $_POST['diskon_3d'];
$diskon_4d = $_POST['diskon_4d'];
$diskon_shio = $_POST['diskon_shio'];
$pajak_bkgg = $_POST['pajak_bkgg'];
$diskon_cb = $_POST['diskon_cb'];
$diskon_mk = $_POST['diskon_mk'];
$diskon_cj = $_POST['diskon_cj'];
$diskon_mkts = $_POST['diskon_mkts'];

$sql = "UPDATE tb_user SET 
			diskon_2d = '$diskon_2d',
			diskon_3d = '$diskon_3d',
			diskon_4d = '$diskon_4d',
            diskon_shio = '$diskon_shio',
            pajak_bkgg = '$pajak_bkgg',
            diskon_cb = '$diskon_cb',
            diskon_mk = '$diskon_mk',
            diskon_cj = '$diskon_cj',
            diskon_mkts = '$diskon_mkts' 
		WHERE username='$username'";
$query = mysqli_query($conn, $sql);

if ($query) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: index.php?page=diskon_hadiah');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}
