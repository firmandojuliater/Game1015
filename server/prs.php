<?php
//include 'permit_cors.php';
$servername = "localhost";
$username = "hapn7578_root";
$password_server = "bwyugzym";
$dbname = "hapn7578_happypoint";
$myObj=new stdClass();
$conn = new mysqli($servername, $username, $password_server, $dbname);

$rows = array();
$postdata = file_get_contents("php://input");
if (isset($postdata)){
	$request = json_decode($postdata);
	$command=$request->command;
	if($command=="Login"){
		$username = $request->username;
		$password = $request->password;

		$sql="SELECT * FROM tb_user WHERE username='$username' AND password='$password' AND keterangan='Available'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			$rows[] = $result->fetch_array();
			$sql2="UPDATE tb_user SET last_login = NOW() WHERE username='$username'";
			$conn->query($sql2);
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		echo json_encode($rows);
	}else if($command=="Register"){
		$username = $request->username;
		$password = $request->password;
		$nama = $request->nama;
		$no_hp = $request->no_hp;

		if ($username != "" AND $password != "" AND $nama != "" AND $no_hp != ""){
			$sql = "INSERT INTO tb_user(username, password, nama, no_hp, hak_akses, point, keterangan)
			VALUES ('$username', '$password', '$nama', '$no_hp', 'Member', 0, 'Unavailable')";
			if($conn->query($sql) === TRUE){
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			echo "Data tidak boleh kosong";
		}
	}else if($command=="Verifikasi"){
		$username = $request->username;
		$sql = "UPDATE tb_user SET keterangan='Available' WHERE username = '$username'";
		if($conn->query($sql) === TRUE) {
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else if($command=="HomeMember"){
		$username = $request->username;

		$sql="SELECT * FROM tb_user WHERE username='$username'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			$rows[] = $result->fetch_array();
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		echo json_encode($rows);
	}else if($command=="addMember"){
		$username = $request->username;
		$password = $request->password;
		$nama = $request->nama;
		$no_hp = $request->no_hp;
		$hak_akses = $request->hak_akses;

		if ($username != "" AND $password != "" AND $nama != "" AND $no_hp != "" AND $hak_akses != ""){
			$sql = "INSERT INTO tb_user(username, password, nama, no_hp, hak_akses, keterangan)
			VALUES ('$username', '$password', '$nama', '$no_hp', '$hak_akses', 'Available')";
			if($conn->query($sql) === TRUE){
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			echo "Data tidak boleh kosong";
		}
	}else if($command=="listMember"){
		$sql="SELECT * FROM tb_user";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="listPointMember"){
		$sql="SELECT * FROM tb_user WHERE hak_akses = 'Member'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="UpdateMember"){
		$username = $request->username;
		$password = $request->password;
		$nama = $request->nama;
		$no_hp = $request->no_hp;

		$sql="UPDATE tb_user SET password='$password', nama='$nama', no_hp='$no_hp' WHERE username='$username'";
		if($conn->query($sql) === TRUE){
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else if($command=="DeleteMember"){
		$username = $request->username;

		$sql="DELETE FROM tb_user WHERE username='$username'";
		if($conn->query($sql) === TRUE){
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else if($command=="TambahPoint"){
		$point = $request->point;
		$username_member = $request->username_member;
		$username_staff = $request->username_staff;

		$sql_cek="SELECT point FROM tb_user WHERE username='$username_member'";
		$result_cek=$conn->query($sql_cek);
		$row_cek=$result_cek->fetch_array();

		$point_total = $point + $row_cek['point'];

		$sql="UPDATE tb_user SET point = $point_total WHERE username = '$username_member'";
		if($conn->query($sql) === TRUE) {
			$sql2="INSERT INTO tb_point(tambah_point, username_member, username_staff, date)
			VALUES ($point, '$username_member', '$username_staff', NOW())";
			$conn->query($sql2);
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else if($command=="TambahSemuaPoint"){
		$point = $request->point;
		$username_staff = $request->username_staff;

		$sql="SELECT * FROM tb_user WHERE hak_akses = 'Member'";
		$result=$conn->query($sql);
		while($row = $result->fetch_array()){
			$point_total = $point + $row['point'];
			
			$sql_update="UPDATE tb_user SET point = $point_total WHERE username = '$row[username]'";
			$sql_report="INSERT INTO tb_point(tambah_point, username_member, username_staff, date)
			VALUES ($point, '$row[username]', '$username_staff', NOW())";
			$conn->query($sql_update);
			$conn->query($sql_report);
		}
	}else if($command=="TarikPoint"){
		$point = $request->point;
		$username_member = $request->username_member;
		$username_staff = $request->username_staff;

		$sql_cek="SELECT point FROM tb_user WHERE username='$username_member'";
		$result_cek=$conn->query($sql_cek);
		$row_cek=$result_cek->fetch_array();

		$point_total = $row_cek['point'] - $point;

		$sql="UPDATE tb_user SET point = $point_total WHERE username = '$username_member'";
		if($conn->query($sql) === TRUE) {
			$sql2="INSERT INTO tb_point(tarik_point, username_member, username_staff, date)
			VALUES ($point, '$username_member', '$username_staff', NOW())";
			$conn->query($sql2);
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else if($command=="AkumulasiPoint"){
		$sql="SELECT SUM(tarik_point) as tarik_point, SUM(tambah_point) as tambah_point, username_member FROM tb_point WHERE date=(SELECT max(date) FROM tb_point) GROUP BY username_member";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="DetailPoint"){
		$sql="SELECT * FROM tb_point WHERE date=(SELECT max(date) FROM tb_point)";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="KeseluruhanPoint"){
		$sql="SELECT * FROM tb_point";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="AkumulasiBarang"){
		$sql="SELECT SUM(quantity) as quantity, nama_barang FROM tb_hadiah WHERE date=(SELECT max(date) FROM tb_hadiah) GROUP BY nama_barang";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="DetailBarang"){
		$sql="SELECT * FROM tb_hadiah WHERE date=(SELECT max(date) FROM tb_hadiah)";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="KeseluruhanBarang"){
		$sql="SELECT * FROM tb_hadiah";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="listHadiah"){
		$sql="SELECT * FROM tb_hadiah";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="listKhususMember"){
		$sql="SELECT * FROM tb_user WHERE hak_akses='Member'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="addHadiah"){
		$username_member = $request->username_member;
		$nama_barang = $request->nama_barang;
		$point_barang = $request->point_barang;
		$quantity = $request->quantity;
		$username_konter = $request->username_konter;
		
		$sql_cek="SELECT point FROM tb_user WHERE username='$username_member'";
		$result_cek=$conn->query($sql_cek);
		$row_cek=$result_cek->fetch_array();
		
		$point_total = $row_cek['point'] - $point_barang;

		if ($username_member != "" AND $nama_barang != "" AND $point_barang != "" AND $quantity != ""){
			$sql = "INSERT INTO tb_hadiah(username_member, nama_barang, point_barang, quantity, username_konter, date)
			VALUES ('$username_member', '$nama_barang', '$point_barang', '$quantity', '$username_konter', NOW())";
			if($conn->query($sql) === TRUE){
				$sql2="INSERT INTO tb_point(tarik_point, username_member, username_staff, date)
				VALUES ($point_barang, '$username_member', '$username_konter', NOW())";
				$conn->query($sql2);
				$sql3="UPDATE tb_user SET point = $point_total WHERE username = '$username_member'";
				$conn->query($sql3);
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			echo "Data tidak boleh kosong";
		}
	}else if($command=="updatePromosi"){
		$promosi = $request->promosi;
		
		$sql_cek="SELECT * FROM tb_promosi";
		$result_cek=$conn->query($sql_cek);
		if($promosi != ""){
		    if($result_cek->num_rows>0){
		        $sql = "UPDATE tb_promosi SET promosi = '$promosi'";
		        if($conn->query($sql) === TRUE){
		        }else{
		            echo "Error: " . $sql . "<br>" . $conn->error;
		        }
		    }else{
		        $sql = "INSERT INTO tb_promosi (promosi) VALUES ('$promosi')";
		        if($conn->query($sql) === TRUE){
		        }else{
		            echo "Error: " . $sql . "<br>" . $conn->error;
		        }
		    }
		}else{
		    echo "Data tidak boleh kosong";
		}
	}else if($command=="PromosiMember"){
		$sql="SELECT * FROM tb_promosi";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="addPengajuan"){
		$username = $request->username;
		$jumlah = $request->point;
		$status = "Waiting";
		
		$sql_cek="SELECT * FROM tb_pengajuan WHERE username='$username' AND status='Waiting'";
		$result_cek=$conn->query($sql_cek);
		if($result_cek->num_rows==0){
		    if ($jumlah != ""){
			    $sql = "INSERT INTO tb_pengajuan(username, jumlah, status)
			    VALUES ('$username', '$jumlah', '$status')";
		    	if($conn->query($sql) === TRUE){
		    	    echo "Point berhasil diajukan";
	    		}else{
    				echo "Error: " . $sql . "<br>" . $conn->error;
			    }
		    }else{
			    echo "Data tidak boleh kosong";
		    }
		}else{
		    echo "Sudah pernah melakukan pengajuan";
		}
	}else if($command=="listPengajuan"){
		$sql="SELECT * FROM tb_pengajuan WHERE status = 'Waiting'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="listPengajuanMember"){
	    $username = $request->username;
		$sql="SELECT * FROM tb_pengajuan WHERE username='$username' AND status = 'Waiting'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else if($command=="updatePengajuan"){
	    $id = $request->id;
		$status = $request->status;
		$username_member = $request->username_member;
		$username_staff = $request->username_staff;
		$jumlah = $request->jumlah;

		$sql_cek="SELECT point FROM tb_user WHERE username='$username_member'";
		$result_cek=$conn->query($sql_cek);
		$row_cek=$result_cek->fetch_array();

		$point_total = $row_cek['point'] - $jumlah;
        $sql_pengajuan="UPDATE tb_pengajuan SET status='$status' WHERE id='$id'";
        if($conn->query($sql_pengajuan) === TRUE) {
            if($status=="Verified"){
                $sql="UPDATE tb_user SET point = $point_total WHERE username = '$username_member'";
		        $sql2="INSERT INTO tb_point(tarik_point, username_member, username_staff, date)
                    VALUES ($jumlah, '$username_member', '$username_staff', NOW())";
                $conn->query($sql);
			    $conn->query($sql2);
            }
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else if($command=="addSpin"){
		$username = $request->username;
		$hadiah = $request->hadiah;
		
	    $sql = "INSERT INTO tb_spin(username, hadiah, waktu)
			    VALUES ('$username', '$hadiah', NOW())";
		if($conn->query($sql) === TRUE){
            echo "Anda mendapatkan $hadiah point";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
	}else if($command=="listSpin"){
		$sql="SELECT * FROM tb_spin ORDER BY waktu DESC";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
		}else{
			echo "0 result";
		}
		echo json_encode($rows);
	}else{
		echo "Unidentified Command";
	}
}
