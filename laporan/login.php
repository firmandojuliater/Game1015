<?php
require "dbConnect.php";
$username=$_POST['username'];
$password=$_POST['password'];
$result = array();
if($username!="" AND $password!=""){
    $query = "SELECT * from tb_user where username like '$username' AND password like '$password'";
    $sql = mysqli_query($conn, $query);
    if(mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $temp = [
            'username'=>$row['username'],
            'akses'=>$row['hak_akses'],
            'message'=>"Login berhasil"
        ];
        array_push($result, $temp);
        mysqli_query($conn, "UPDATE tb_user SET last_login=NOW() WHERE username = '$username'");
    }else{
        $temp = [
            'message'=>"Username/password anda tidak terdaftar"
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