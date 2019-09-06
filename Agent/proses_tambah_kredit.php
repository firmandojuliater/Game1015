<?php
include '../koneksi.php';


// $credit = $_POST['credit'];
$username = $_POST['username'];
$credit = $_POST['credit'];

$sql_cek = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
$query_cek = mysqli_query($conn, $sql_cek);
$row_cek = mysqli_fetch_array($query_cek);

$sql_cek2 = "SELECT * FROM tb_user WHERE username = '$username'";
$query_cek2 = mysqli_query($conn, $sql_cek2);
$row_cek2 = mysqli_fetch_array($query_cek2);

if($row_cek['credit'] < $credit){
    echo "
        <script>
            alert('Credit tidak cukup');
            document.location.href = 'index.php?page=credit';
        </script>
    ";
}else{
    if(is_null($row_cek['used_credit'])){
        $row_cek['used_credit']=0;
    }
    
    $used_credit = $row_cek['used_credit'] + $credit;
    $credit_agent = $row_cek['credit'] - $credit;
    $credit_member = $row_cek2['credit'] + $credit;
    $sql_member = "UPDATE tb_user SET
                credit = '$credit_member' WHERE username='$username'";

    $query_member = mysqli_query($conn, $sql_member);
    
    if( $query_member ) {
        $sql_agent = "UPDATE tb_user SET
                credit = '$credit_agent', used_credit='$used_credit' WHERE username='$_SESSION[username]'";
        mysqli_query($conn, $sql_agent);
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: index.php?page=credit');
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}
}
