<?php
require "dbConnect.php";
$id_laporan=$_POST['id_laporan'];
$penjualan_sementara=$_POST['penjualan_sementara'];
$penjualan_total=$_POST['penjualan_total'];
$pembelian_sementara=$_POST['pembelian_sementara'];
$pembelian_total=$_POST['pembelian_total'];
$keterangan=$_POST['keterangan'];
$total=$_POST['total'];
$username=$_POST['username'];
$result = array();
if($keterangan!=""){
    $query = "UPDATE tb_laporan SET penjualan_sementara='$penjualan_sementara', penjualan_total='$penjualan_total', pembelian_sementara='$pembelian_sementara', pembelian_total='$pembelian_total', total='$total' WHERE id_laporan='$id_laporan' AND created_by='$username' AND periode IN (SELECT max(id_periode) from tb_periode WHERE username='$username')";
    if(mysqli_query($conn, $query)){
        $jumlah = 1;
        $sql_cek=mysqli_query($conn, "SELECT * FROM tb_barang WHERE nama_barang LIKE '$keterangan'");
        if($row_cek=mysqli_fetch_assoc($sql_cek)){
            $jumlah=$row_cek['jumlah']+1;
            if(mysqli_query($conn, "UPDATE tb_barang SET jumlah=$jumlah, waktu=NOW() WHERE nama_barang='$keterangan' AND username='$username'")){
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
            if(mysqli_query($conn, "INSERT INTO tb_barang(nama_barang,jumlah,waktu,username) VALUES('$keterangan',$jumlah,NOW(),'$username')")){
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
        }
    }else{
        $temp = [
            'message'=>"Data gagal disimpan"
        ];
        array_push($result, $temp);
    }
}else{
    $query = "UPDATE tb_laporan SET penjualan_sementara='$penjualan_sementara', penjualan_total='$penjualan_total', pembelian_sementara='$pembelian_sementara', pembelian_total='$pembelian_total', total='$total' WHERE id_laporan='$id_laporan' AND created_by='$username' AND periode IN (SELECT max(id_periode) from tb_periode WHERE username='$username')";
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
}

echo json_encode($result);
?>