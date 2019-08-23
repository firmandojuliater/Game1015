<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($conn, $sql);

if ($query){
	$row = mysqli_fetch_assoc($query);
	$hak_akses = $row["hak_akses"];
	$status = $row["status"];
	if($hak_akses == "Master Agent"){
		$_SESSION['username'] = $row['username'];
		$_SESSION['hak_akses'] = $row['hak_akses'];
		mysqli_query($conn, "UPDATE tb_user SET last_login=NOW(), is_logged='True' WHERE username = '$username'");
		echo "
			<script>
				alert('Welcome Master Agent $row[username]');
				document.location.href = 'MasterAgent/';
			</script>
		";
	}else if($hak_akses == "Agent"){
		if($status == "Suspended"){
			echo "
				<script>
					alert('Tidak bisa login! Silahkan hubungi Master Agent');
					document.location.href = 'index.php';
				</script>
			";
		}else{
			$_SESSION['username'] = $row['username'];
			$_SESSION['hak_akses'] = $row['hak_akses'];
			mysqli_query($conn, "UPDATE tb_user SET last_login=NOW(), is_logged='True' WHERE username = '$username'");
			echo "
				<script>
					alert('Welcome Agent $row[username]');
					document.location.href = 'Agent/';
				</script>
			";
		}
	}else if($hak_akses == "Member"){
		if($status == "Suspended"){
			echo "
				<script>
					alert('Tidak bisa login! Silahkan hubungi Agent');
					document.location.href = 'index.php';
				</script>
			";
		}else{
			$_SESSION['username'] = $row['username'];
			$_SESSION['hak_akses'] = $row['hak_akses'];
			mysqli_query($conn, "UPDATE tb_user SET last_login=NOW(), is_logged='True' WHERE username = '$username'");
			echo "
				<script>
					alert('Welcome Member $row[username]');
					document.location.href = 'Member/';
				</script>
			";
		}
	}else{
		echo "
			<script>
				alert('Username tidak terdaftar!');
				document.location.href = 'index.php';
			</script>
		";
	}
}else{
	echo "
            <script>
                alert('Username atau Password Salah!');
                document.location.href = 'index.php';
            </script>
        ";
}

mysqli_close($conn);
?>