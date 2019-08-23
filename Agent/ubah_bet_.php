<?php
require '../koneksi.php'; ?>

<html>
<head>
    <title>FORM BET</title>
</head>
<body>
    <h1>UPDATE Max Credit/Min Max/EM</h1>
		<form action="proses_ubah_bet.php?username=<?php echo $_GET['username']; ?>" method="POST">
			<?php
			$username=$_GET ['username'];
			$query = "SELECT * FROM tb_user WHERE username='$username'";
			$sql = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($sql); ?>    
		<table> 
            <!-- <tr> 
				<td>
					<label for="credit">Credit : </label>
					<input type="credit" name="credit" id="credit" value="<?php echo $row['credit']?>"> Max Credit = <?php echo $row['credit']; ?>
				</td>
			</tr> -->
			<tr> 
				<td>
					<label for="max_bet">Max Bet : </label>
					<input type="max_bet" name="max_bet" id="max_bet" value="<?php echo $row['max_bet']?>"> Max Bet = <?php echo $row['max_bet']; ?>
				</td>
			</tr>
			<tr> 
				<td>
					<label for="min_bet">Min Bet : </label>
					<input type="min_bet" name="min_bet" id="min_bet" value="<?php echo $row['min_bet']?>"> Min Bet = <?php echo $row['min_bet']; ?>
				</td>
			</tr>
			<tr> 
				<td>
					<label for="max_bet_2d">Max Bet 2d : </label>
					<input type="max_bet_2d" name="max_bet_2d" id="max_bet_2d" value="<?php echo $row['max_bet_2d']?>"> Max Bet 2d = <?php echo $row['max_bet_2d']; ?>
				</td>
			</tr>
			<tr> 
				<td>
					<label for="max_bet_3d">Max Bet 3d : </label>
					<input type="max_bet_3d" name="max_bet_3d" id="max_bet_3d" value="<?php echo $row['max_bet_3d']?>"> Max Bet 3d = <?php echo $row['max_bet_3d']; ?>
				</td>
			</tr><tr> 
				<td>
					<label for="max_bet_4d">Max Bet 4d : </label>
					<input type="max_bet_4d" name="max_bet_4d" id="max_bet_4d" value="<?php echo $row['max_bet_4d']?>"> Max Bet 4d = <?php echo $row['max_bet_4d']; ?>
				</td>
			</tr>
			<tr> 
				<td>
					<label for="max_bet_other">Max Bet Other : </label>
					<input type="max_bet_other" name="max_bet_other" id="max_bet_other" value="<?php echo $row['max_bet_other']?>"> Max Bet Other = <?php echo $row['max_bet_other']; ?>
				</td>
			</tr>
		</table>

		<button type="submit" name="submit"  value="Save">UPDATE BET</button><br><br>
		<a href="index.php">Kembali ke halaman Awal</a>
    </form>
	</body>
		