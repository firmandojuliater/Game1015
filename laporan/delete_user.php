<?php
require "dbConnect.php";
$username=$_POST['username'];
$result = array();
if($username!=""){
    $query = "DELETE FROM tb_user WHERE username='$username'";
    if(mysqli_query($conn, $query)){
        $temp = [
            'message'=>"Data berhasil dihapus"
        ];
        array_push($result, $temp);
    }else{
        $temp = [
            'message'=>"Data gagal dihapus"
        ];
        array_push($result, $temp);
    }
}else{
    $temp = [
        'message'=>"Username tidak boleh kosong"
    ];
    array_push($result, $temp);
}
echo json_encode($result);
?>