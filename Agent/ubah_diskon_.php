


<html>
<head>
    <title>FORM AGENT</title>
</head>
<body>
    <h1>UPDATE DATA DISKON & HADIAH</h1>
		<form action="proses_ubah_diskon_kredit.php?username=<?php echo $_GET['username']; ?>" method="POST">
			<?php
			$username=$_GET ['username'];
			$query = "SELECT * FROM tb_user WHERE username='$username'";
			$sql = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($sql); ?>
		<table>
        <tr>
				<td>
					Diskon & Hadiah<br>
					<label for="2d">2d</label>
					<input type="text" name="diskon_2d" id="diskon_2d" value="<?php echo $row['diskon_2d']?>"> X
					<input type="text" name="hadiah_2d" id="hadiah_2d" placeholder="Hadiah 2D" value="<?php echo $row['hadiah_2d']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="3d">3d</label>
					<input type="text" name="diskon_3d" id="diskon_3d" value="<?php echo $row['diskon_3d']?>"> X
					<input type="text" name="hadiah_3d" id="hadiah_3d" placeholder="Hadiah 3D" value="<?php echo $row['hadiah_3d']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="4d">4d</label>
					<input type="text" name="diskon_4d" id="diskon_4d" value="<?php echo $row['diskon_4d']?>"> X
					<input type="text" name="hadiah_4d" id="hadiah_4d" placeholder="Hadiah 4D" value="<?php echo $row['hadiah_4d']?>">
				</td>
			</tr>
			<tr>
				<td>
					Diskon & Hadiah<br>
					<label for="shio">Shio</label>
					<input type="text" name="diskon_shio" id="diskon_shio" value="<?php echo $row['diskon_shio']?>"> X
					<input type="text" name="hadiah_shio" id="hadiah_shio" placeholder="Hadiah shio" value="<?php echo $row['hadiah_shio']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="bkgg">BK/GG</label>
					<input type="text" name="diskon_bkgg" id="diskon_bkgg" value="<?php echo $row['diskon_bkgg']?>"> X
					<input type="text" name="hadiah_bkgg" id="hadiah_bkgg" placeholder="Hadiah BK/GG" value="<?php echo $row['hadiah_bkgg']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="cb">CB</label>
					<input type="text" name="diskon_cb" id="diskon_cb" value="<?php echo $row['diskon_cb']?>"> X
					<input type="text" name="hadiah_cb" id="hadiah_cb" placeholder="Hadiah CB" value="<?php echo $row['hadiah_cb']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="cm">CM</label>
					<input type="text" name="diskon_cm" id="diskon_cm" value="<?php echo $row['diskon_cm']?>"> X
					<input type="text" name="hadiah_cm" id="hadiah_cm" placeholder="Hadiah CM" value="<?php echo $row['hadiah_cm']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="cj">CJ</label>
					<input type="text" name="diskon_cj" id="diskon_cj" value="<?php echo $row['diskon_cj']?>"> X
					<input type="text" name="hadiah_cj" id="hadiah_cj" placeholder="Hadiah CJ" value="<?php echo $row['hadiah_cj']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="cn">CN</label>
					<input type="text" name="diskon_cn" id="diskon_cn" value="<?php echo $row['diskon_cn']?>"> X
					<input type="text" name="hadiah_cn" id="hadiah_cn" placeholder="Hadiah CN" value="<?php echo $row['hadiah_cn']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="gp">GP</label>
					<input type="text" name="diskon_gp" id="diskon_gp" placeholder="Diskon GP" value="<?php echo $row['diskon_gp']?>"> X
					<input type="text" name="hadiah_gp" id="hadiah_gp" placeholder="Hadiah GP" value="<?php echo $row['hadiah_gp']?>">
				</td>
			</tr>

		</table>
	<button type="submit" name="submit"  value="Save">UPDATE DISKON/HADIAH</button><br><br>
		<a href="index.php">Kembali ke halaman awal</a>
    </form>
</body>
