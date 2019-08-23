<?php
require "dbConnect.php";
$result = array();
$username = $_POST['username'];
$query = "SELECT * from tb_barang WHERE username='$username' ORDER BY waktu DESC";
$sql = mysqli_query($conn, $query);
if(mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)){
        $temp = [
            'nama_barang'=>$row['nama_barang'],
            'jumlah'=>$row['jumlah'],
            'waktu'=>$row['waktu'],
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