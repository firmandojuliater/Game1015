<?php
session_start();
if($_SESSION['hak_akses']!="Member"){
	echo "
		<script>
			alert('Anda tidak berhak mengakses halaman ini');
			document.location.href = '../';
		</script>
	";
}
?>