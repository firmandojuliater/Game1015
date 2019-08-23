<?php
require "dbConnect.php";
$result = array();
$query = "SELECT * from tb_user WHERE hak_akses='Staff'";
$sql = mysqli_query($conn, $query);
if(mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)){
        $temp = [
            'username'=>$row['username'],
            'last_login'=>$row['last_login'],
            'message'=>"Data tersedia"
        ];
        array_push($result, $temp);
    }
}else{
    $temp = [
        'message'=>"Tidak ada data"
    ];
    array_push($result, $temp);
}
echo json_encode($result);
?>