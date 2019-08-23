<?php
require "dbConnect.php";
$username=$_POST['username'];
$result = array();
if($username!=""){
    $a=1;
    $sql_cek=mysqli_query($conn, "SELECT * from tb_laporan WHERE created_by='$username' AND periode IN (SELECT max(id_periode) from tb_periode WHERE username='$username')");
    while(mysqli_fetch_assoc($sql_cek)){
        $a++;
    }
    $query = "INSERT INTO tb_laporan(id_laporan, created_by, periode) VALUES($a,'$username',(SELECT max(id_periode) FROM tb_periode WHERE username='$username'))";
    if(mysqli_query($conn, $query)){
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
    $temp = [
        'message'=>"Data tidak boleh kosong"
    ];
    array_push($result, $temp);
}
echo json_encode($result);
?>