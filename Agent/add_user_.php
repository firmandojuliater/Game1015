<?php include 'cek_session.php';
include '../koneksi.php'; ?>
<html>
<head>
    <title>FORM AGENT</title>
    <script src="../js/jquery-1.11.3.js"></script>
</head>
<body>
    <h1>Form Add MEMBER</h1>
    <form action="proses_add_user.php" method="post">
		<?php
		$query = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
		$sql = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($sql);
		?>
		<table>
			<tr>
				<td>
					<label for="username">Username : </label>
					<input type="text" name="username_awal" id="username_awal" value="<?php echo $row['username']; ?>" disabled>
					<input type="text" name="username" id="username" maxlength="3" onkeypress="return isNumberKey(event)" required>
					<button type="button" onclick="cek_user()">Check Availability</button>
          <div id="status"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">Password : </label>
					<input type="password" name="password" id="password" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="first_name">First Name : </label>
					<input type="text" name="first_name" id="first_name" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="last_name">Last Name : </label>
					<input type="text" name="last_name" id="last_name" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="phone">Phone : </label>
					<input type="text" name="phone" id="phone" onkeypress="return isNumberKey(event)" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mobile">Mobile : </label>
					<input type="text" name="mobile" id="mobile" onkeypress="return isNumberKey(event)">
				</td>
			</tr>
		</table>

		<h1>Max Credit/Min Max/EM</h1>
		<table>
			<tr>
				<td>
					<label for="credit">Credit : </label>
					<input type="number" name="credit" id="credit" onkeypress="return isNumberKey(event)" required> Max Credit = <?php echo $row['credit']; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="max_bet_2d">Max Bet 2d : </label>
					<input type="number" name="max_bet_2d" id="max_bet_2d" onkeypress="return isNumberKey(event)" required> Max Bet 2d = <?php echo $row['max_bet_2d']; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="max_bet_3d">Max Bet 3d : </label>
					<input type="number" name="max_bet_3d" id="max_bet_3d" onkeypress="return isNumberKey(event)" required> Max Bet 3d = <?php echo $row['max_bet_3d']; ?>
				</td>
			</tr><tr>
				<td>
					<label for="max_bet_4d">Max Bet 4d : </label>
					<input type="number" name="max_bet_4d" id="max_bet_4d" onkeypress="return isNumberKey(event)" required> Max Bet 4d = <?php echo $row['max_bet_4d']; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="max_bet_other">Max Bet Other : </label>
					<input type="number" name="max_bet_other" id="max_bet_other" onkeypress="return isNumberKey(event)" required> Max Bet Other = <?php echo $row['max_bet_other']; ?>
				</td>
			</tr>
		</table>

		<h1>MARKET</h1>
		<table>
			<tr>
				<td>
					<input type="radio" name="market" id="market" value="A" checked>A<br>
				</td>
        <td>
          2d
        </td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="market" id="market" value="B">B<br>
				</td>
        <td>
          2d, 3d, 4d
        </td>
			</tr>
		</table>

		<h1>DISKON & HADIAH</h1>
		<table>
			<tr>
				<td>
					<label for="2d">2d</label>
        </td>
        <td>
					<input type="number" name="diskon_2d" id="diskon_2d" onkeypress="return isNumberKey(event)" placeholder="Diskon 2d" required> X
        </td>
        <td>
					<input type="number" name="hadiah_2d" id="hadiah_2d" onkeypress="return isNumberKey(event)" placeholder="Hadiah 2d" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="3d">3d</label>
        </td>
        <td>
					<input type="number" name="diskon_3d" id="diskon_3d" onkeypress="return isNumberKey(event)" placeholder="Diskon 3d" required> X
        </td>
        <td>
					<input type="number" name="hadiah_3d" id="hadiah_3d" onkeypress="return isNumberKey(event)" placeholder="Hadiah 3d" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="4d">4d</label>
        </td>
        <td>
					<input type="number" name="diskon_4d" id="diskon_4d" onkeypress="return isNumberKey(event)" placeholder="Diskon 4d" required> X
        </td>
        <td>
					<input type="number" name="hadiah_4d" id="hadiah_4d" onkeypress="return isNumberKey(event)" placeholder="Hadiah 4d" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="shio">Shio</label>
        </td>
        <td>
					<input type="number" name="diskon_shio" id="diskon_shio" onkeypress="return isNumberKey(event)" placeholder="Diskon Shio" required> X
        </td>
        <td>
					<input type="number" name="hadiah_shio" id="hadiah_shio" onkeypress="return isNumberKey(event)" placeholder="Hadiah Shio" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="bkgg">BK/GG</label>
        </td>
        <td>
					<input type="number" name="diskon_bkgg" id="diskon_bkgg" onkeypress="return isNumberKey(event)" placeholder="Diskon BK/GG" required> X
        </td>
        <td>
					<input type="number" name="hadiah_bkgg" id="hadiah_bkgg" onkeypress="return isNumberKey(event)" placeholder="Hadiah BK/GG" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cb">CB</label>
        </td>
        <td>
					<input type="number" name="diskon_cb" id="diskon_cb" onkeypress="return isNumberKey(event)" placeholder="Diskon CB" required> X
        </td>
        <td>
					<input type="number" name="hadiah_cb" id="hadiah_cb" onkeypress="return isNumberKey(event)" placeholder="Hadiah CB" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mk">MK</label>
        </td>
        <td>
					<input type="number" name="diskon_mk" id="diskon_mk" onkeypress="return isNumberKey(event)" placeholder="Diskon MK" required> X
        </td>
        <td>
					<input type="number" name="hadiah_mk" id="hadiah_mk" onkeypress="return isNumberKey(event)" placeholder="Hadiah MK" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cj">CJ</label>
        </td>
        <td>
					<input type="number" name="diskon_cj" id="diskon_cj" onkeypress="return isNumberKey(event)" placeholder="Diskon CJ" required> X
        </td>
        <td>
					<input type="number" name="hadiah_cj" id="hadiah_cj" onkeypress="return isNumberKey(event)" placeholder="Hadiah CJ" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mkts">MKTS</label>
        </td>
        <td>
					<input type="number" name="diskon_mkts" id="diskon_mkts" onkeypress="return isNumberKey(event)" placeholder="Diskon MKTS" required> X
        </td>
        <td>
					<input type="number" name="hadiah_mkts" id="hadiah_mkts" onkeypress="return isNumberKey(event)" placeholder="Hadiah MKTS" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="bb2">BB2</label>
        </td>
        <td>
					<input type="number" name="diskon_bb2" id="diskon_bb2" onkeypress="return isNumberKey(event)" placeholder="Diskon BB2" required> X
        </td>
        <td>
					<input type="number" name="hadiah_bb2" id="hadiah_bb2" onkeypress="return isNumberKey(event)" placeholder="Hadiah BB2" required>
				</td>
			</tr>
      <tr>
				<td>
					<label for="bb3">BB3</label>
        </td>
        <td>
					<input type="number" name="diskon_bb3" id="diskon_bb3" onkeypress="return isNumberKey(event)" placeholder="Diskon BB3" required> X
        </td>
        <td>
					<input type="number" name="hadiah_bb3" id="hadiah_bb3" onkeypress="return isNumberKey(event)" placeholder="Hadiah BB3" required>
				</td>
			</tr>
      <tr>
				<td>
					<label for="bb4">BB4</label>
        </td>
        <td>
					<input type="number" name="diskon_bb4" id="diskon_bb4" onkeypress="return isNumberKey(event)" placeholder="Diskon BB4" required> X
        </td>
        <td>
					<input type="number" name="hadiah_bb4" id="hadiah_bb4" onkeypress="return isNumberKey(event)" placeholder="Hadiah BB4" required>
				</td>
			</tr>
      <tr>
				<td>
					<label for="bbset">BB Set</label>
        </td>
        <td>
					<input type="number" name="diskon_bbset" id="diskon_bbset" onkeypress="return isNumberKey(event)" placeholder="Diskon BB Set" required> X
        </td>
        <td>
					<input type="number" name="hadiah_bbset" id="hadiah_bbset" onkeypress="return isNumberKey(event)" placeholder="Hadiah BB Set" required>
				</td>
			</tr>
      <tr>
        <td>
          <label for="set">Set</label>
        </td>
        <td>
          <input type="number" name="diskon_set" id="diskon_set" onkeypress="return isNumberKey(event)" placeholder="Diskon Set" required> X
        </td>
        <td>
          <input type="number" name="hadiah_set" id="hadiah_set" onkeypress="return isNumberKey(event)" placeholder="Hadiah Set" required>
        </td>
      </tr>
		</table><br>
		<button type="submit" name="submit">Tambah USER</button><br><br>
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
function cek_user(){
  var username = $("#username").val();

  $("#status").html('<img src="../Agent/username_loader.gif" /> Checking availability...');
    // check username
  $.post("../Agent/cek_username.php", {username: username}, function(data, status){
    $("#status").html(data);
  });
}
</script>
