<?php
if(isset($_GET['page'])){
  $page=$_GET['page'];
  $halaman="$page.php";
  include "$halaman";
}else{
  include "list_user.php";
}
?>
