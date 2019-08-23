<?php
require "dbConnect.php";
$result=array();
$jumlah = 1;
        $sql_cek=mysqli_query($conn, "SELECT * FROM tb_barang WHERE nama_barang LIKE 'Coklat'");
        if($row_cek=mysqli_fetch_assoc($sql_cek)){
            $jumlah=$row_cek['jumlah']+1;
            if(mysqli_query($conn, "UPDATE tb_barang SET jumlah=$jumlah, waktu=NOW() WHERE nama_barang='Coklat')")){
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
echo $jumlah;
?>