<?php
session_start();

include '../koneksi.php';
$username = $_SESSION['username'];
mysqli_query($conn, "UPDATE tb_user SET is_logged='False' WHERE username = '$username'");

session_destroy();
echo "
		<script>
			document.location.href = '../';
		</script>
	";
?>