<?php
require "dbConnect.php";
$teks=$_POST['teks'];
$result = array();
$query = "UPDATE tb_notepad SET teks='$teks'";
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
echo json_encode($result);
?>