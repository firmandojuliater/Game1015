<?php 
include '../koneksi.php'; 
include 'cek_session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORM KREDIT</title>
</head>
<body>
    <h1>TAMBAH KREDIT</h1>
    <form action="proses_tambah_kredit.php?username=<?php echo $_GET['username']; ?>" method="POST">
		
		<?php
		//$username = $_SESSION['username'];
		$username = $_GET ['username'];
		$sql_cek = "SELECT * FROM tb_user WHERE username = '$username'";
		$query_cek = mysqli_query($conn, $sql_cek);
		$row_cek = mysqli_fetch_array($query_cek);
		?>
		
	<input type="hidden" name="username" value="<?= $row_cek['username']?>">
	<input type="hidden" name="credit" value="<?= $row_cek['credit']?>"> 

	<tr>
		<td>
      <label for="credit1">Banyak kredit yang ingin ditambah :</label>
		<input type="number" name="credit1" id="credit1" onkeypress="return isNumberKey(event)" required>
		</td>
	</tr>
	
	<button type="submit" name="submit" value="Save">Tambah Kredit</button><br><br>
	<a href="index.php">Kembali ke halaman awal</a>
	</form>
  
  
</body>
</html>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
