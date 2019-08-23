<?php
include '../koneksi.php';

$username = $_POST['username'];
$hadiah_2d = $_POST['hadiah_2d'];
$hadiah_3d = $_POST['hadiah_3d'];
$hadiah_4d = $_POST['hadiah_4d'];
$hadiah_shio = $_POST['hadiah_shio'];
$pajak_bkgg = $_POST['pajak_bkgg'];
$hadiah_bkgg = $_POST['hadiah_bkgg'];
$hadiah_cb = $_POST['hadiah_cb'];
$hadiah_cj = $_POST['hadiah_cj'];

$sql = "UPDATE tb_user SET 
			hadiah_2d = '$hadiah_2d',
			hadiah_3d = '$hadiah_3d', 
			hadiah_4d = '$hadiah_4d',
            hadiah_shio ='$hadiah_shio',
            pajak_bkgg ='$pajak_bkgg',
            hadiah_bkgg ='$hadiah_bkgg',
            hadiah_cb ='$hadiah_cb',
            hadiah_cj ='$hadiah_cj' 
		WHERE username='$username'";
$query = mysqli_query($conn, $sql);

if ($query) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: index.php?page=diskon_hadiah');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}
