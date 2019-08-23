<?php
require "dbConnect.php";
$result = array();
$query = "SELECT * from tb_user WHERE hak_akses='Staff'";
$sql = mysqli_query($conn, $query);
if(mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)){
        $sql_cek = mysqli_query($conn, "SELECT SUM(penjualan_total) AS penjualan_total, SUM(pembelian_total) AS pembelian_total, SUM(total) AS total, periode, created_by from tb_laporan WHERE created_by='$row[username]' AND periode IN (SELECT max(id_periode) from tb_periode WHERE username='$row[username]')");
        $row_cek=mysqli_fetch_assoc($sql_cek);
        $temp = [
            'penjualan_total'=>$row_cek['penjualan_total'],
            'pembelian_total'=>$row_cek['pembelian_total'],
            'total'=>$row_cek['total'],
            'periode'=>$row_cek['periode'],
            'username'=>$row_cek['created_by'],
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