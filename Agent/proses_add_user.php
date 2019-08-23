<?php
include 'cek_session.php';
include '../koneksi.php';

if(isset($_POST['submit'])){
	$username = $_SESSION['username'] . $_POST['username'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$credit = $_POST['credit'];
	$max_bet_2d = $_POST['max_bet_2d'];
	$max_bet_3d = $_POST['max_bet_3d'];
	$max_bet_4d = $_POST['max_bet_4d'];
	$max_bet_other = $_POST['max_bet_other'];
	$market = $_POST['market'];
	$diskon_2d = $_POST['diskon_2d'];
	$hadiah_2d = $_POST['hadiah_2d'];
	$diskon_3d = $_POST['diskon_3d'];
	$hadiah_3d = $_POST['hadiah_3d'];
	$diskon_4d = $_POST['diskon_4d'];
	$hadiah_4d = $_POST['hadiah_4d'];
	$diskon_shio = $_POST['diskon_shio'];
	$hadiah_shio = $_POST['hadiah_shio'];
	$pajak_bkgg = $_POST['pajak_bkgg'];
	$hadiah_bkgg = $_POST['hadiah_bkgg'];
	$diskon_cb = $_POST['diskon_cb'];
	$hadiah_cb = $_POST['hadiah_cb'];
	$diskon_mk = $_POST['diskon_mk'];
	$hadiah_mk = $_POST['hadiah_mk'];
	$diskon_cj = $_POST['diskon_cj'];
	$hadiah_cj = $_POST['hadiah_cj'];
	$diskon_mkts = $_POST['diskon_mkts'];
	$hadiah_mkts = $_POST['hadiah_mkts'];
	$created_by = $_SESSION['username'];

	$sql = "INSERT INTO tb_user(
		username, password, first_name, last_name, phone, mobile, credit,
		max_bet_2d, max_bet_3d, max_bet_4d, max_bet_other, market, diskon_2d,
		hadiah_2d, diskon_3d, hadiah_3d, diskon_4d, hadiah_4d, diskon_shio,
		hadiah_shio, pajak_bkgg, hadiah_bkgg, diskon_cb, hadiah_cb, diskon_mk,
		hadiah_mk, diskon_cj, hadiah_cj, diskon_mkts, hadiah_mkts, created_by,
		status, hak_akses, is_logged)
		VALUES('$username', '$password', '$first_name', '$last_name', '$phone',
			'$mobile', '$credit', '$max_bet_2d', '$max_bet_3d', '$max_bet_4d',
			'$max_bet_other', '$market', '$diskon_2d', '$hadiah_2d', '$diskon_3d',
			'$hadiah_3d', '$diskon_4d', '$hadiah_4d', '$diskon_shio', '$hadiah_shio',
			'$pajak_bkgg', '$hadiah_bkgg', '$diskon_cb', '$hadiah_cb', '$diskon_mk',
			'$hadiah_mk', '$diskon_cj', '$hadiah_cj', '$diskon_mkts', '$hadiah_mkts',
			'$created_by', 'Available', 'Member', 'False')";
	$query = mysqli_query($conn, $sql);

	$sql_cek = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
	$query_cek = mysqli_query($conn, $sql_cek);
	$row_cek = mysqli_fetch_array($query_cek);
	if($row_cek['credit'] < $credit){
		echo "
			<script>
				alert('Credit tidak cukup');
			</script>
		";
	}else if($row_cek['max_bet_2d'] < $max_bet_2d){
		echo "
			<script>
				alert('Max bet 2d tidak cukup');
			</script>
		";
	}else if($row_cek['max_bet_3d'] < $max_bet_3d){
		echo "
			<script>
				alert('Max bet 3d tidak cukup');
			</script>
		";
	}else if($row_cek['max_bet_4d'] < $max_bet_4d){
		echo "
			<script>
				alert('Max bet 4d tidak cukup');
			</script>
		";
	}else if($row_cek['max_bet_other'] < $max_bet_other){
		echo "
			<script>
				alert('Max bet other tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_2d'] < $diskon_2d){
		echo "
			<script>
				alert('Diskon 2d tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_2d'] < $hadiah_2d){
		echo "
			<script>
				alert('Hadiah 2d tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_3d'] < $diskon_3d){
		echo "
			<script>
				alert('Diskon 3d tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_3d'] < $hadiah_3d){
		echo "
			<script>
				alert('Hadiah 3d tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_4d'] < $diskon_4d){
		echo "
			<script>
				alert('Diskon 4d tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_4d'] < $hadiah_4d){
		echo "
			<script>
				alert('Hadiah 4d tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_shio'] < $diskon_shio){
		echo "
			<script>
				alert('Diskon shio tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_shio'] < $hadiah_shio){
		echo "
			<script>
				alert('Hadiah shio tidak cukup');
			</script>
		";
	}else if($row_cek['pajak_bkgg'] < $pajak_bkgg){
		echo "
			<script>
				alert('Pajak bkgg tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_bkgg'] < $hadiah_bkgg){
		echo "
			<script>
				alert('Hadiah bkgg tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_cb'] < $diskon_cb){
		echo "
			<script>
				alert('Diskon cb tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_cb'] < $hadiah_cb){
		echo "
			<script>
				alert('Hadiah cb tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_mk'] < $diskon_mk){
		echo "
			<script>
				alert('Diskon mk tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_mk'] < $hadiah_mk){
		echo "
			<script>
				alert('Hadiah mk tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_cj'] < $diskon_cj){
		echo "
			<script>
				alert('Diskon cj tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_cj'] < $hadiah_cj){
		echo "
			<script>
				alert('Hadiah cj tidak cukup');
			</script>
		";
	}else if($row_cek['diskon_mkts'] < $diskon_mkts){
		echo "
			<script>
				alert('Diskon mkts tidak cukup');
			</script>
		";
	}else if($row_cek['hadiah_mkts'] < $hadiah_mkts){
		echo "
			<script>
				alert('Hadiah mkts tidak cukup');
			</script>
		";
	}else{
		if($query){
			if(is_null($row_cek['used_credit'])){
				$row_cek['used_credit']=0;
			}if(is_null($row_cek['member'])){
				$row_cek['member']=0;
			}
			$used_credit = $row_cek['used_credit'] + $credit;
			$credit_agent = $row_cek['credit'] - $credit;
			$member = $row_cek['member'] + 1;
			$sql_update_user = "UPDATE tb_user SET used_credit = '$used_credit',
				credit = '$credit_agent', member = '$member'
				WHERE username = '$_SESSION[username]'";
			$sql_tb_kredit = "INSERT INTO tb_kredit(kredit_out, username_receiver,
				username_giver) VALUES ('$credit', '$username', '$_SESSION[username]')";
			mysqli_query($conn, $sql_update_user);
			mysqli_query($conn, $sql_tb_kredit);
			echo "
				<script>
					alert('Berhasil mendaftar Member');
					document.location.href = 'list_user.php';
				</script>
			";
		}else{
			echo "
				<script>
					alert('Gagal mendaftar Member');
				</script>
			";
		}
	}
}
mysqli_close($conn);
