<?php
require "dbConnect.php";
$result = array();
$username=$_POST['username'];
$query = "SELECT SUM(penjualan_total) AS penjualan_total, SUM(pembelian_total) AS pembelian_total, SUM(total) AS total, periode, created_by from tb_laporan WHERE created_by='$username' GROUP BY periode ORDER BY periode DESC";
$sql = mysqli_query($conn, $query);
if(mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)){
        $temp = [
            'penjualan_total'=>$row['penjualan_total'],
            'pembelian_total'=>$row['pembelian_total'],
            'total'=>$row['total'],
            'periode'=>$row['periode'],
            'username'=>$row['created_by'],
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