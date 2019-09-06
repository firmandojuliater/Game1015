<?php
include '../koneksi.php';
$username = $_GET["username"];
$query = "DELETE FROM tb_user WHERE username = '$username'";
$sql = mysqli_query($conn, $query);
$sql_cek = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
$query_cek = mysqli_query($conn, $sql_cek);
$row_cek = mysqli_fetch_array($query_cek);

 if($sql){
    //  header ("location: list_user.php");
    if(is_null($row_cek['deleted_member'])){
        $row_cek['deleted_member']=0;
    }if(is_null($row_cek['member'])){
        $row_cek['member']=0;
    }
    $deleted_member = $row_cek['deleted_member'] + 1;
    $member = $row_cek['member'] - 1;

    $sql_update_user = "UPDATE tb_user SET deleted_member = '$deleted_member',
                        member = '$member' WHERE username = '$_SESSION[username]'";
            
    mysqli_query($conn, $sql_update_user);
    
    echo "
    <script>
         alert('data berhasil dihapus!');
         document.location.href ='list_user.php';
     </script>
     ";
 } else {
     echo "
     <script>
         alert('data gagal dihapus!');
         document.location.href ='list_user.php';
     </script>
     ";
 }

?> 