<?php
session_start();
if(isset($_SESSION['username'])){
	if($_SESSION['hak_akses']=="Member"){
		echo "
			<script>
				document.location.href = 'Member/';
			</script>
		";
	}else if($_SESSION['hak_akses']=="Agent"){
		echo "
			<script>
				document.location.href = 'Agent/';
			</script>
		";
	}else if($_SESSION['hak_akses']=="Master Agent"){
		echo "
			<script>
				document.location.href = 'MasterAgent/';
			</script>
		";
	}	
}
?>