<?php
require "dbConnect.php";
$username=$_POST['username'];
$password=$_POST['password'];
$result = array();
if($username!="" AND $password!=""){
    $query = "INSERT INTO tb_user(username,password,hak_akses) VALUES('$username','$password','Staff')";
    if(mysqli_query($conn, $query)){
        $temp = [
            'message'=>"Data berhasil dimasukkan"
        ];
        array_push($result, $temp);
    }else{
        $temp = [
            'message'=>"Data gagal dimasukkan"
        ];
        array_push($result, $temp);
    }
}else{
    $temp = [
        'message'=>"Username/password tidak boleh kosong"
    ];
    array_push($result, $temp);
}
echo json_encode($result);
?>