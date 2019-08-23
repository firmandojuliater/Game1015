<?php
require "dbConnect.php";
$tipe=$_POST['tipe'];
$result = array();
if($tipe=="All"){
    $sql=mysqli_query($conn, "SELECT * FROM tb_user WHERE hak_akses ='Staff'");
    if(mysqli_num_rows($sql) > 0) {
        while($row=mysqli_fetch_assoc($sql)){
            $a=1;
            $sql_cek=mysqli_query($conn, "SELECT * from tb_periode WHERE username='$row[username]'");
            while(mysqli_fetch_assoc($sql_cek)){
                $a++;
            }
            mysqli_query($conn, "INSERT INTO tb_periode(id_periode, date, username) VALUES($a,NOW(),'$row[username]')");
            mysqli_query($conn, "DELETE FROM tb_barang WHERE username='$row[username]'");
        }
        $temp = [
            'message'=>"Data berhasil disimpan"
        ];
        array_push($result, $temp);
    }else{
        $temp = [
            'message'=>"Data gagal disimpan"
        ];
        array_push($result, $temp);
    }
}else{
    $username=$_POST['username'];
    $a=1;
    $sql_cek=mysqli_query($conn, "SELECT * from tb_periode WHERE username='$username'");
    while(mysqli_fetch_assoc($sql_cek)){
        $a++;
    }
    $query = "INSERT INTO tb_periode(id_periode,date,username) VALUES($a,NOW(),'$username')";
    if(mysqli_query($conn, $query)){
        mysqli_query($conn, "DELETE FROM tb_barang WHERE username='$username'");
        $temp = [
            'message'=>"Data berhasil disimpan"
        ];
        array_push($result, $temp);
    }else{
        $temp = [
            'message'=>"Data gagal disimpan"
        ];
        array_push($result, $temp);
    }
}
echo json_encode($result);
?>