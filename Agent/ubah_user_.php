<?php
require '../koneksi.php'; ?>

<html>
<head>
    <title>FORM AGENT</title>
</head>
<body>
    <h1>UPDATE DATA AGENT</h1>
		<form action="proses_ubah_user.php?username=<?php echo $_GET['username']; ?>" method="POST">
			<?php
			$username=$_GET ['username'];
			$query = "SELECT * FROM tb_user WHERE username='$username'";
			$sql = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($sql); ?>
		<table>
		<tr>
			<td>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?= $row['username']?>" disabled>
			</td>
		</tr>
		<tr>
				<td>
					<label for="first_name">First Name : </label>
					<input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="last_name">Last Name : </label>
					<input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="phone">Phone : </label>
					<input type="text" name="phone" id="phone" value="<?php echo $row['phone']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="mobile">Mobile : </label>
					<input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile']?>">
				</td>
			</tr>
		</table>
	<button type="submit" name="submit"  value="Save">UPDATE USER</button><br><br>
		<a href="index.php">Kembali ke halaman awal</a>
    </form>
</body>
