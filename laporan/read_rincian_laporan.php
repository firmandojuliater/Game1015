<?php
require "dbConnect.php";
$username=$_POST['username'];
$periode=$_POST['periode'];
$result = array();
$query = "SELECT * from tb_laporan WHERE created_by='$username' AND periode = '$periode'";
$sql = mysqli_query($conn, $query);
if(mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)){
        $temp = [
            'id_laporan'=>$row['id_laporan'],
            'penjualan_sementara'=>$row['penjualan_sementara'],
            'penjualan_total'=>$row['penjualan_total'],
            'pembelian_sementara'=>$row['pembelian_sementara'],
            'pembelian_total'=>$row['pembelian_total'],
            'total'=>$row['total'],
            'created_by'=>$row['created_by'],
            'periode'=>$row['periode'],
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