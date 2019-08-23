<?php
include '../koneksi.php';
$username = $_GET["username"];
$query = "DELETE FROM tb_user WHERE username = '$username'";
$sql = mysqli_query($conn, $query);

if ($sql) {
    //  header ("location: list_user.php");
    echo "
    <script>
         alert('data berhasil dihapus!');
         document.location.href ='index.php';
     </script>
     ";
} else {
    echo "
     <script>
         alert('data gagal dihapus!');
         document.location.href ='index.php';
     </script>
     ";
}
