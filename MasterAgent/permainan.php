<?php include 'cek_session.php';
include '../koneksi.php'; ?>
<html>
<head>
    <title>FORM MASTER AGENT</title>
</head>
<body>
    <h1>Form Permainan</h1>
    <form action="permainan.php" method="post">
		<table>
			<tr>
				<td>
					<label for="result">Result : </label>
					<input type="text" name="result" id="result" required>
				</td>
			</tr>
		</table><br>
		<button type="submit" name="submit">Masukkan Hasil</button><br><br>
		<a href="index.php">Kembali ke halaman awal</a>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $list_anjing = ["01", "13", "25", "37", "49", "61", "73", "85", "97"];
  $list_ayam = ["02", "14", "26", "38", "50", "62", "74", "86", "98"];
  $list_monyet = ["03", "15", "27", "39", "51", "63", "75", "87", "99"];
  $list_kambing = ["04", "16", "28", "40", "52", "64", "76", "88", "00"];
  $list_kuda = ["05", "17", "29", "41", "53", "65", "77", "89"];
  $list_ular = ["06", "18", "30", "42", "54", "66", "78", "90"];
  $list_naga = ["07", "19", "31", "43", "55", "67", "79", "91"];
  $list_kelinci = ["08", "20", "32", "44", "56", "68", "80", "92"];
  $list_harimau = ["09", "21", "33", "45", "57", "69", "81", "93"];
  $list_kerbau = ["10", "22", "34", "46", "58", "70", "82", "94"];
  $list_tikus = ["11", "23", "35", "47", "59", "71", "83", "95"];
  $list_babi = ["12", "24", "36", "48", "60", "72", "84", "96"];
  $sql = "SELECT * FROM tb_permainan WHERE status = 2";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query) > 0){
    $result = $_POST['result'];
    $row = mysqli_fetch_assoc($query);
    $permainan = $row['id_permainan'];
    $sql = "UPDATE tb_permainan SET result = '$result', status = 0 WHERE status = 2";
    $query = mysqli_query($conn, $sql);
    if($query){
      $sql = "SELECT * from tb_bet WHERE id_permainan = '$permainan'";
      $query = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($query)){
        $temp_bb = array();
        $user_bet = $row['bet'];
        $jumlah_user_bet = $row['jumlah_bet'];
        $sql_cek = "SELECT * FROM tb_user WHERE username = '$row[username_member]'";
        $query_cek = mysqli_query($conn, $sql_cek);
        $row_cek = mysqli_fetch_array($query_cek);
        $credit_temp = $row_cek['credit'];
        if(is_numeric($user_bet)){
          if($user_bet >= 0 && $user_bet < 100){
            $result_temp = substr($result, 2);
            if($result_temp==$user_bet){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_2d'];
            }
          }else if($user_bet < 1000){
            $result_temp = substr($result, 1);
            if($result_temp==$user_bet){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_3d'];
            }
          }else if($user_bet < 10000){
            if($result==$user_bet){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_4d'];
            }
          }
        }else{
          if(strpos($user_bet, 'CB') !== false){
            $result_temp = count(preg_grep("~^[$user_bet]$~", str_split($result)));
            $credit_temp += ($jumlah_user_bet * $row_cek['hadiah_cb']) * $result_temp;
          }else if(strpos($user_bet, 'MK') !== false){
            $user_bet_temp = str_split(substr($user_bet,2));
            foreach ($user_bet_temp as $input){
              $result_temp = count(preg_grep("~^[$input]$~", str_split($result)));
            }
            $credit_temp += ($jumlah_user_bet * $row_cek['hadiah_mk']) * ($result_temp / 2);
          }else if(strpos($user_bet, 'RIBUAN') !== false){
            $result_temp = substr($result, 0, -3);
            $user_bet_temp = substr($user_bet, 6);
            if($result_temp==$user_bet_temp){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_cj'];
            }
          }else if(strpos($user_bet, 'RATUSAN') !== false){
            $result_temp = substr($result, 1, -2);
            $user_bet_temp = substr($user_bet, 7);
            if($result_temp==$user_bet_temp){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_cj'];
            }
          }else if(strpos($user_bet, 'PULUHAN') !== false){
            $result_temp = substr($result, 2, -1);
            $user_bet_temp = substr($user_bet, 7);
            if($result_temp==$user_bet_temp){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_cj'];
            }
          }else if(strpos($user_bet, 'SATUAN') !== false){
            $result_temp = substr($result, 3);
            $user_bet_temp = substr($user_bet, 6);
            if($result_temp==$user_bet_temp){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_cj'];
            }
          }else if(strpos($user_bet, 'ANJING') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_anjing as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'AYAM') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_ayam as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'MONYET') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_monyet as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'KAMBING') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_kambing as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'KUDA') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_kuda as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'ULAR') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_ular as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'NAGA') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_naga as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'KELINCI') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_kelinci as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'HARIMAU') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_harimau as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'KERBAU') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_kerbau as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'TIKUS') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_tikus as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'BABI') !== false){
            $result_temp = substr($result, 2);
            foreach ($list_babi as $input){
              if($result_temp==$input){
                $credit_temp += $jumlah_user_bet * $row_cek['hadiah_shio'];
              }
            }
          }else if(strpos($user_bet, 'BESAR') !== false){
            $result_temp = substr($result, 2);
            if($result_temp>=50){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_bkgg'];
            }
          }else if(strpos($user_bet, 'KECIL') !== false){
            $result_temp = substr($result, 2);
            if($result_temp<50){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_bkgg'];
            }
          }else if(strpos($user_bet, 'GENAP') !== false){
            $result_temp = substr($result, 2);
            if($result_temp%2==0){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_bkgg'];
            }
          }else if(strpos($user_bet, 'GANJIL') !== false){
            $result_temp = substr($result, 2);
            if($result_temp%2==1){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_bkgg'];
            }
          }else if(strpos($user_bet, 'BESARGANJIL') !== false){
            $result_temp = substr($result, 2);
            if($result_temp>=50 && $result_temp%2==1){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_mkts'];
            }
          }else if(strpos($user_bet, 'BESARGENAP') !== false){
            $result_temp = substr($result, 2);
            if($result_temp>=50 && $result_temp%2==0){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_mkts'];
            }
          }else if(strpos($user_bet, 'KECILGANJIL') !== false){
            $result_temp = substr($result, 2);
            if($result_temp<50 && $result_temp%2==1){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_mkts'];
            }
          }else if(strpos($user_bet, 'KECILGENAP') !== false){
            $result_temp = substr($result, 2);
            if($result_temp<50 && $result_temp%2==0){
              $credit_temp += $jumlah_user_bet * $row_cek['hadiah_mkts'];
            }
          }
        }
        $sql_credit = "UPDATE tb_user SET credit = $credit_temp WHERE username = '$row[username_member]'";
        mysqli_query($conn, $sql_credit);
      }
      echo "
        <script>
          alert('Hasil berhasil dimasukkan');
        </script>
      ";
    }else{
      echo "
        <script>
          alert('Gagal menambah hasil');
        </script>
      ";
    }
  }else {
    echo "
      <script>
        alert('Permainan belum selesai');
      </script>
    ";
  }
}

function permute($str, $l, $r)
{
    if ($l == $r)
        array_push($temp_bb, $str);
    else
    {
        for ($i = $l; $i <= $r; $i++)
        {
            $str = swap($str, $l, $i);
            permute($str, $l + 1, $r);
            $str = swap($str, $l, $i);
        }
    }
}

function swap($a, $i, $j)
{
    $temp;
    $charArray = str_split($a);
    $temp = $charArray[$i] ;
    $charArray[$i] = $charArray[$j];
    $charArray[$j] = $temp;
    return implode($charArray);
}
?>
