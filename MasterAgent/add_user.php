<?php
include 'cek_session.php';
include '../koneksi.php'; ?>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="../js/jquery-1.11.3.js"></script>
</head>

<body>

	<div id="contentwrapper">
		<div class="main_content">

			<nav>
				<div id="jCrumbs" class="breadCrumb module">
					<ul>
						<li>
							<a href="?page=2"><i class="icon-home"></i></a>
						</li>
						<li>
							<a href="#">Member</a>
						</li>
						<li>
							List Member
						</li>
					</ul>
				</div>
			</nav>

			<div class="formSep">
				<div class="row-fluid">
					<div class="span6">
						<h3 class="heading">Form Add AGENT & MEMBER</h3>
						<form action="proses_add_user.php" method="post" class="form_validation_ttip">
							<?php
							$query = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
							$sql = mysqli_query($conn, $query);
							$row = mysqli_fetch_array($sql);
							?>
							<div class="formSep">
								<div class="row-fluid">
									<div class="span5">
										<label>Username :</label>
										<input type="text" class="span12" name="username_awal" id="username_awal" value="<?php echo $row['username']; ?>" disabled>
									</div>
									<div class="span5">
										<label>_</label>
										<input type="text" class="span12" name="username" id="username" maxlength="3" onkeypress="return isNumberKey(event)" required>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span5">
										<button type="button" class="btn btn-success" onclick="cek_user()">Check Availability</button>
									</div>
									<div class="span5">
										<div id="status"></div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span10">
									<label>Password :</label>
									<input type="password" class="span12" name="password" id="password" required>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span5">
									<label>First Name :</label>
									<input type="text" class="span12" name="first_name" id="first_name" required>
								</div>
								<div class="span5">
									<label>Last Name :</label>
									<input type="text" class="span12" name="last_name" id="last_name" required>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span5">
									<label>Phone :</label>
									<input type="text" class="span12" name="phone" id="phone" onkeypress="return isNumberKey(event)" required>
								</div>
								<div class="span5">
									<label>Mobile :</label>
									<input type="text" class="span12" name="mobile" id="mobile" onkeypress="return isNumberKey(event)">
								</div>
							</div>
					</div>

					<div class="span6">
						<h3 class="heading">Max Credit / Min Max / EM</h3>
						<div class="formSep">
							<div class="row-fluid">
								<div class="span10">
									<label>Credit</label>
									<input type="number" name="credit" class="span12" id="credit" onkeypress="return isNumberKey(event)" required>
									<span class="f_req"> Max Credit = <?php echo $row['credit']; ?></span>
								</div>
							</div>
						</div>
						<div class="formSep">
							<div class="row-fluid">
								<div class="span5">
									<label>Max Bet :</label>
									<input type="number" name="max_bet" class="span12" id="max_bet" onkeypress="return isNumberKey(event)" required>
									<span class="f_req"> Max Bet = <?php echo $row['max_bet']; ?></span>
								</div>
								<div class="span5">
									<label>Min Bet :</label>
									<input type="number" name="min_bet" class="span12" id="min_bet" onkeypress="return isNumberKey(event)" required>
									<span class="f_req">Min Bet = <?php echo $row['min_bet']; ?></span>
								</div>
							</div>
						</div>
						<div class="formSep">
							<div class="row-fluid">
								<div class="span5">
									<label>Max Bet 2d :</label>
									<input type="number" name="max_bet_2d" class="span12" id="max_bet_2d" onkeypress="return isNumberKey(event)" required>
									<span class="f_req">Max Bet 2d = <?php echo $row['max_bet_2d']; ?></span>
								</div>
								<div class="span5">
									<label>Max Bet 3d :</label>
									<input type="number" name="max_bet_3d" class="span12" id="max_bet_3d" onkeypress="return isNumberKey(event)" required>
									<span class="f_req">Max Bet 3d = <?php echo $row['max_bet_3d']; ?></span>
								</div>

							</div>
						</div>
						<div class="formSep">
							<div class="row-fluid">
								<div class="span5">
									<label>Max Bet 4d :</label>
									<input type="number" name="max_bet_4d" class="span12" id="max_bet_4d" onkeypress="return isNumberKey(event)" required>
									<span class="f_req">Max Bet 4d = <?php echo $row['max_bet_4d']; ?></span>
								</div>
								<div class="span5">
									<label>Max Bet Other :</label>
									<input type="number" name="max_bet_other" class="span12" id="max_bet_other" onkeypress="return isNumberKey(event)" required>
									<span class="f_req">Max Bet Other = <?php echo $row['max_bet_other']; ?></span>
								</div>
							</div>
						</div>

						<div class="formSep">
							<h3 class="heading">MARKET</h3>
							<div class="row-fluid">
								<div class="span4">
									<label>2d</label>
									<input type="radio" name="market" id="market" value="A" checked>A<br>
								</div>
								<div class="span4">
									<label>2d, 3d, 4d</label>
									<input type="radio" name="market" id="market" value="B">B<br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<h3 class="heading">DISKON & HADIAH</h3>
				</div>
			</div>

			<div class="formSep">
				<div class="row-fluid">
					<div class="span6">
						<div class="row-fluid">
							<div class="span12">
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
											<input type="number" name="pajak_bkgg" id="pajak_bkgg" onkeypress="return isNumberKey(event)" placeholder="Pajak BK/GG" required> X
										</td>
										<td>
											<input type="number" name="hadiah_bkgg" id="hadiah_bkgg" onkeypress="return isNumberKey(event)" placeholder="Hadiah BK/GG" required>
										</td>
									</tr>

								</table>
							</div>
						</div>
					</div>

					<div class="span6">
						<div class="row-fluid">
							<div class="span12">
								<table>
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
											<label for="cm">CM</label>
										</td>
										<td>
											<input type="number" name="diskon_cm" id="diskon_cm" onkeypress="return isNumberKey(event)" placeholder="Diskon CM" required> X
										</td>
										<td>
											<input type="number" name="hadiah_cm" id="hadiah_cm" onkeypress="return isNumberKey(event)" placeholder="Hadiah CM" required>
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
											<label for="cn">CN</label>
										</td>
										<td>
											<input type="number" name="diskon_cn" id="diskon_cn" onkeypress="return isNumberKey(event)" placeholder="Diskon CN" required> X
										</td>
										<td>
											<input type="number" name="hadiah_cn" id="hadiah_cn" onkeypress="return isNumberKey(event)" placeholder="Hadiah CN" required>
										</td>
									</tr>
									<tr>
										<td>
											<label for="gp">GP</label>
										</td>
										<td>
											<input type="number" name="diskon_gp" id="diskon_gp" onkeypress="return isNumberKey(event)" placeholder="Diskon GP" required> X
										</td>
										<td>
											<input type="number" name="hadiah_gp" id="hadiah_gp" onkeypress="return isNumberKey(event)" placeholder="Hadiah GP" required>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<center> <button type="submit" class="btn btn-info btn-large" name="submit">Tambah USER</button><br><br> </center>
		</div>
	</div>
	</form>
</body>

</html>

<script>
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>