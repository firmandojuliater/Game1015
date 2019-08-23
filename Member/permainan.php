<?php include 'cek_session.php';
include '../koneksi.php'; ?>
<html>
<head>
    <title>FORM MEMBER</title>
</head>
<body>
    <h1>Permainan</h1>
    <form action="permainan.php" method="post">
		<table>
			<tr>
				<td>
					<label for="input">Input : </label>
					<input type="text" name="input" id="input" onkeydown="upperCaseF(this)" required>
				</td>
			</tr>
		</table>
		<button type="submit" name="submit">BET</button><br><br>
		<a href="index.php">Kembali ke halaman awal</a>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  //Mengecek permainan apakah sedang dimulai
  $sql = "SELECT * FROM tb_permainan WHERE status = 1 ";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query) > 0){
    if($array_count = preg_match_all('!\d+|X|@|=|[A-WY-Z]+!', $_POST['input'], $temp))
      $output=$temp[0];
    $input=array();
    $a=0;
    $array_temp = '';
    for($i=0;$i<$array_count;$i++){
      if($a==0){
        if($output[$i]=='X'||$output[$i]=='@'||$output[$i]=='='){
          $a=1;
          $array_temp=rtrim($array_temp,',');
          $array_temp = $array_temp.$output[$i].$output[$i+1];
          if($output[$i+2]=='/'){
            $array_temp = $array_temp.$output[$i+2].$output[$i+3];
            if($output[$i+4]=='/'){
              $array_temp = $array_temp.$output[$i+4].$output[$i+5];
            }else{
              echo "
        				<script>
        					alert('Format BBSET yang anda gunakan tidak sesuai');
        				</script>
        			";
            }
          }
        }else if(preg_match_all('![A-WY-Z]+!', $output[$i])){
          if(is_numeric($output[$i+1])){
            $array_temp = $array_temp.$output[$i].",";
            $array_temp=rtrim($array_temp,',');
          }else{
            $array_temp = $array_temp.$output[$i].",";
          }
        }else{
          $array_temp = $array_temp.$output[$i].",";
        }
      }else{
        $a=0;
        array_push($input, $array_temp);
        $array_temp = '';
      }
    }
  	foreach ($input as $bet){
  		if(strpos($bet, '=') !== false){
  			$jumlah = explode("=", $bet);
  		}elseif(strpos($bet, 'X') !== false){
  			$jumlah = explode("X", $bet);
  		}elseif(strpos($bet, '@') !== false){
  			$jumlah = explode("@", $bet);
  		}else{
  			echo "
  				<script>
  					alert('Format yang anda gunakan tidak sesuai');
  				</script>
  			";
  		}
  		if(!empty($jumlah)){
        $jumlah_2d = array();
        $jumlah_3d = array();
        $jumlah_4d = array();
        $jumlah_cb = array();
        $jumlah_mk = array();
        $jumlah_ribuan = array();
        $jumlah_ratusan = array();
        $jumlah_puluhan = array();
        $jumlah_satuan = array();
        $jumlah_anjing = array();
        $jumlah_ayam = array();
        $jumlah_monyet = array();
        $jumlah_kambing = array();
        $jumlah_kuda = array();
        $jumlah_ular = array();
        $jumlah_naga = array();
        $jumlah_kelinci = array();
        $jumlah_harimau = array();
        $jumlah_kerbau = array();
        $jumlah_tikus = array();
        $jumlah_babi = array();
        $jumlah_besar = array();
        $jumlah_kecil = array();
        $jumlah_genap = array();
        $jumlah_ganjil = array();
        $jumlah_besarganjil = array();
        $jumlah_besargenap = array();
        $jumlah_kecilganjil = array();
        $jumlah_kecilgenap = array();
        $jumlah_bb2 = array();
        $jumlah_bb3 = array();
        $jumlah_bb4 = array();
        $jumlah_bbset = array();
        $jumlah_set = array();
        $bet_2d = array();
        $bet_3d = array();
        $bet_4d = array();
        $bet_cb = array();
        $bet_mk = array();
        $bet_ribuan = array();
        $bet_ratusan = array();
        $bet_puluhan = array();
        $bet_satuan = array();
        $bet_anjing = array();
        $bet_ayam = array();
        $bet_monyet = array();
        $bet_kambing = array();
        $bet_kuda = array();
        $bet_ular = array();
        $bet_naga = array();
        $bet_kelinci = array();
        $bet_harimau = array();
        $bet_kerbau = array();
        $bet_tikus = array();
        $bet_babi = array();
        $bet_besar = array();
        $bet_kecil = array();
        $bet_genap = array();
        $bet_ganjil = array();
        $bet_besarganjil = array();
        $bet_besargenap = array();
        $bet_kecilganjil = array();
        $bet_kecilgenap = array();
        $bet_bb2 = array();
        $bet_bb3 = array();
        $bet_bb4 = array();
        $bet_bbset = array();
        $bet_set = array();
        $bet = $jumlah[0];
        $jumlah_bet = $jumlah[1];
        $username = $_SESSION['username'];
        $sql_bet = "SELECT * FROM tb_bet WHERE username_member = '$username' AND id_permainan=(SELECT MAX(id_permainan) FROM tb_permainan) GROUP BY 'bet'";
        $query_bet = mysqli_query($conn, $sql_bet);
        while($row_bet = mysqli_fetch_array($query_bet)){
          if(is_numeric($row_bet['bet'])){
            if($row_bet['bet'] < 100)
              array_push($bet_2d, $row_bet['bet']);
              array_push($jumlah_2d, $row_bet['jumlah_bet']);
            else if($row_bet['bet'] < 1000)
              array_push($bet_3d, $row_bet['bet']);
              array_push($jumlah_3d, $row_bet['jumlah_bet']);
            else if($row_bet['bet'] < 10000)
              array_push($bet_4d, $row_bet['bet']);
              array_push($jumlah_4d, $row_bet['jumlah_bet']);
          }else{
            if(strpos($row_bet['bet'], 'CB') !== false){
              array_push($bet_cb, $row_bet['bet']);
              array_push($jumlah_cb, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'MK') !== false){
              array_push($bet_mk, $row_bet['bet']);
              array_push($jumlah_mk, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'RIBUAN') !== false){
              array_push($bet_ribuan, $row_bet['bet']);
              array_push($jumlah_ribuan, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'RATUSAN') !== false){
              array_push($bet_ratusan, $row_bet['bet']);
              array_push($jumlah_ratusan, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'PULUHAN') !== false){
              array_push($bet_puluhan, $row_bet['bet']);
              array_push($jumlah_puluhan, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'SATUAN') !== false){
              array_push($bet_satuan, $row_bet['bet']);
              array_push($jumlah_satuan, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'ANJING') !== false){
              array_push($bet_anjing, $row_bet['bet']);
              array_push($jumlah_anjing, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'AYAM') !== false){
              array_push($bet_ayam, $row_bet['bet']);
              array_push($jumlah_ayam, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'MONYET') !== false){
              array_push($bet_monyet, $row_bet['bet']);
              array_push($jumlah_monyet, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KAMBING') !== false){
              array_push($bet_kambing, $row_bet['bet']);
              array_push($jumlah_kambing, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KUDA') !== false){
              array_push($bet_kuda, $row_bet['bet']);
              array_push($jumlah_kuda, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'ULAR') !== false){
              array_push($bet_ular, $row_bet['bet']);
              array_push($jumlah_ular, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'NAGA') !== false){
              array_push($bet_naga, $row_bet['bet']);
              array_push($jumlah_naga, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KELINCI') !== false){
              array_push($bet_kelinci, $row_bet['bet']);
              array_push($jumlah_kelinci, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'HARIMAU') !== false){
              array_push($bet_harimau, $row_bet['bet']);
              array_push($jumlah_harimau, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KERBAU') !== false){
              array_push($bet_kerbau, $row_bet['bet']);
              array_push($jumlah_kerbau, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'TIKUS') !== false){
              array_push($bet_tikus, $row_bet['bet']);
              array_push($jumlah_tikus, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BABI') !== false){
              array_push($bet_babi, $row_bet['bet']);
              array_push($jumlah_babi, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BESAR') !== false){
              array_push($bet_besar, $row_bet['bet']);
              array_push($jumlah_besar, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KECIL') !== false){
              array_push($bet_kecil, $row_bet['bet']);
              array_push($jumlah_kecil, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'GENAP') !== false){
              array_push($bet_genap, $row_bet['bet']);
              array_push($jumlah_genap, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'GANJIL') !== false){
              array_push($bet_ganjil, $row_bet['bet']);
              array_push($jumlah_ganjil, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BESARGANJIL') !== false){
              array_push($bet_besarganjil, $row_bet['bet']);
              array_push($jumlah_besarganjil, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BESARGENAP') !== false){
              array_push($bet_besargenap, $row_bet['bet']);
              array_push($jumlah_besargenap, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KECILGANJIL') !== false){
              array_push($bet_kecilganjil, $row_bet['bet']);
              array_push($jumlah_kecilganjil, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'KECILGENAP') !== false){
              array_push($bet_kecilgenap, $row_bet['bet']);
              array_push($jumlah_kecilgenap, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BB2') !== false){
              array_push($bet_bb2, $row_bet['bet']);
              array_push($jumlah_bb2, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BB3') !== false){
              array_push($bet_bb3, $row_bet['bet']);
              array_push($jumlah_bb3, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BB4') !== false){
              array_push($bet_bb4, $row_bet['bet']);
              array_push($jumlah_bb4, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'BBSET') !== false){
              array_push($bet_bbset, $row_bet['bet']);
              array_push($jumlah_bbset, $row_bet['jumlah_bet']);
            }else if(strpos($row_bet['bet'], 'SET') !== false){
              array_push($bet_set, $row_bet['bet']);
              array_push($jumlah_set, $row_bet['jumlah_bet']);
            }
          }
        }
        //Mengecek format bet
        if(is_numeric($bet)){
          if(!($bet > 9 && $bet < 10000)){
            echo "
      				<script>
      					alert('Format yang anda gunakan tidak sesuai');
      				</script>
      			";
          }
        }else{
          if(!(preg_match('(CB|MK|RIBUAN|RATUSAN|PULUHAN|SATUAN|ANJING|AYAM|MONYET|KAMBING|KUDA|ULAR|NAGA|KELINCI|HARIMAU|KERBAU|TIKUS|BABI|BESAR|KECIL|GENAP|GANJIL|BESARGANJIL|BESARGENAP|KECILGANJIL|KECILGENAP|BB2|BB3|BB4|BBSET|SET)', $bet) === TRUE)){
            echo "
      				<script>
      					alert('Format yang anda gunakan tidak sesuai');
      				</script>
      			";
          }
        }

        if(is_numeric($jumlah_bet)){
          $jumlah_bet_temp=0;
          if($jumlah_bet < 0){
            echo "
              <script>
                alert('Jumlah bet kurang dari bet minimal');
              </script>
            ";
          }else{
            if(strpos($bet, ',') !== false){
              $bet_temp = explode(",", $bet);
            }else{
              $bet_temp = $bet;
            }

            foreach ($bet_temp as $bet){
              $sql_cek = "SELECT * FROM tb_user WHERE username = '$username'";
              $query_cek = mysqli_query($conn, $sql_cek);
              $row_cek = mysqli_fetch_array($query_cek);
              $credit_sisa=$row_cek['credit'];
              $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet)
                      VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$bet', '$jumlah_bet')";
              $jumlah_bet_temp=0;
              $cek_bet = 0;
              $temp_bb = array();

              if(is_numeric($bet)){
                if($bet > 9 && $bet < 100){
                  for($k=0;$k<count($bet_2d);$k++){
                    if($bet==$bet_2d[$k]){
                      $jumlah_2d[$k] += $jumlah_bet;
                      if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                        echo "
                  				<script>
                  					alert('Jumlah bet 2D melebihi maksimal');
                  				</script>
                  			";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                    }
                  }
                  $m = strlen(substr($bet_bb2[$k], 3));
                  permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                  for($o=0;$o<count($temp_bb_cek);$o++){
                    if($bet==$temp_bb_cek[$o]){
                      $jumlah_2d[$k] += $jumlah_bet;
                      if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                        echo "
                          <script>
                            alert('Jumlah bet 2D melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_2d']){
                      echo "
                        <script>
                          alert('Jumlah bet 2D melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                  }
                }else if($bet < 1000){
                  for($k=0;$k<count($bet_3d);$k++){
                    if($bet==$bet_3d[$k]){
                      $jumlah_3d[$k] += $jumlah_bet;
                      if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                        echo "
                  				<script>
                  					alert('Jumlah bet 3D melebihi maksimal');
                  				</script>
                  			";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                    }
                  }
                  $m = strlen(substr($bet_bb3[$k], 3));
                  permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                  for($o=0;$o<count($temp_bb_cek);$o++){
                    if($bet==$temp_bb_cek[$o]){
                      $jumlah_3d[$k] += $jumlah_bet;
                      if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                        echo "
                          <script>
                            alert('Jumlah bet 3D melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_3d']){
                      echo "
                        <script>
                          alert('Jumlah bet 3D melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                  }
                }else if($bet < 10000){
                  for($k=0;$k<count($bet_4d);$k++){
                    if($bet==$bet_4d[$k]){
                      $jumlah_4d[$k] += $jumlah_bet;
                      if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                        echo "
                  				<script>
                  					alert('Jumlah bet 4D melebihi maksimal');
                  				</script>
                  			";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                    }
                  }
                  $m = strlen(substr($bet_bb4[$k], 3));
                  permute2(substr($bet_bb4[$k], 3), 0, $m - 1);
                  for($o=0;$o<count($temp_bb_cek);$o++){
                    if($bet==$temp_bb_cek[$o]){
                      $jumlah_4d[$k] += $jumlah_bet;
                      if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                        echo "
                          <script>
                            alert('Jumlah bet 4D melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_4d']){
                      echo "
                        <script>
                          alert('Jumlah bet 4D melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                  }
                }
              }else{
                if(strpos($bet, 'CB') !== false){
                  if(strlen(substr($bet, 2))!=1){
                    echo "
                      <script>
                        alert('Bet CB hanya memasukkan 1 angka');
                      </script>
                    ";
                  }
                  for($k=0;$k<count($bet_cb);$k++){
                    if($bet==$bet_cb[$k]){
                      $jumlah_cb[$k] += $jumlah_bet;
                      if($jumlah_cb[$k] > $row_cek['max_bet_cb']){
                        echo "
                  				<script>
                  					alert('Jumlah bet CB melebihi maksimal');
                  				</script>
                  			";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cb']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_cb']){
                      echo "
                        <script>
                          alert('Jumlah bet CB melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cb']/100));
                  }
                }else if(strpos($bet, 'MK') !== false){
                  if(strlen(substr($bet, 2))!=2){
                    echo "
                      <script>
                        alert('Bet MK hanya memasukkan 2 angka');
                      </script>
                    ";
                  }
                  for($k=0;$k<count($bet_mk);$k++){
                    if($bet==$bet_mk[$k]){
                      $jumlah_mk[$k] += $jumlah_bet;
                      if($jumlah_mk[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet MK melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mk']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet MK melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mk']/100));
                  }
                }else if(strpos($bet, 'RIBUAN') !== false){
                  if(strlen(substr($bet, 6))!=1){
                    echo "
                      <script>
                        alert('Bet RIBUAN hanya memasukkan 1 angka');
                      </script>
                    ";
                  }
                  for($k=0;$k<count($bet_ribuan);$k++){
                    if($bet==$bet_ribuan[$k]){
                      $jumlah_ribuan[$k] += $jumlah_bet;
                      if($jumlah_ribuan[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet RIBUAN melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet RIBUAN melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                  }
                }else if(strpos($bet, 'RATUSAN') !== false){
                  if(strlen(substr($bet, 7))!=1){
                    echo "
                      <script>
                        alert('Bet RATUSAN hanya memasukkan 1 angka');
                      </script>
                    ";
                  }
                  for($k=0;$k<count($bet_ratusan);$k++){
                    if($bet==$bet_ratusan[$k]){
                      $jumlah_ratusan[$k] += $jumlah_bet;
                      if($jumlah_ratusan[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet RATUSAN melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet RATUSAN melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                  }
                }else if(strpos($bet, 'PULUHAN') !== false){
                  if(strlen(substr($bet, 7))!=1){
                    echo "
                      <script>
                        alert('Bet PULUHAN hanya memasukkan 1 angka');
                      </script>
                    ";
                  }
                  for($k=0;$k<count($bet_puluhan);$k++){
                    if($bet==$bet_puluhan[$k]){
                      $jumlah_puluhan[$k] += $jumlah_bet;
                      if($jumlah_puluhan[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet PULUHAN melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet PULUHAN melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                  }
                }else if(strpos($bet, 'SATUAN') !== false){
                  if(strlen(substr($bet, 6))!=1){
                    echo "
                      <script>
                        alert('Bet SATUAN hanya memasukkan 1 angka');
                      </script>
                    ";
                  }
                  for($k=0;$k<count($bet_satuan);$k++){
                    if($bet==$bet_satuan[$k]){
                      $jumlah_satuan[$k] += $jumlah_bet;
                      if($jumlah_satuan[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet SATUAN melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet SATUAN melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_cj']/100));
                  }
                }else if(strpos($bet, 'ANJING') !== false){
                  for($k=0;$k<count($bet_anjing);$k++){
                    if($bet==$bet_anjing[$k]){
                      $jumlah_anjing[$k] += $jumlah_bet;
                      if($jumlah_anjing[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet ANJING melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet ANJING melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'AYAM') !== false){
                  for($k=0;$k<count($bet_ayam);$k++){
                    if($bet==$bet_ayam[$k]){
                      $jumlah_ayam[$k] += $jumlah_bet;
                      if($jumlah_ayam[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet AYAM melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet AYAM melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'MONYET') !== false){
                  for($k=0;$k<count($bet_monyet);$k++){
                    if($bet==$bet_monyet[$k]){
                      $jumlah_monyet[$k] += $jumlah_bet;
                      if($jumlah_monyet[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet MONYET melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet MONYET melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'KAMBING') !== false){
                  for($k=0;$k<count($bet_kambing);$k++){
                    if($bet==$bet_kambing[$k]){
                      $jumlah_kambing[$k] += $jumlah_bet;
                      if($jumlah_kambing[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KAMBING melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KAMBING melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'KUDA') !== false){
                  for($k=0;$k<count($bet_kuda);$k++){
                    if($bet==$bet_kuda[$k]){
                      $jumlah_kuda[$k] += $jumlah_bet;
                      if($jumlah_kuda[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KUDA melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KUDA melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'ULAR') !== false){
                  for($k=0;$k<count($bet_ular);$k++){
                    if($bet==$bet_ular[$k]){
                      $jumlah_ular[$k] += $jumlah_bet;
                      if($jumlah_ular[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet ULAR melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet ULAR melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'NAGA') !== false){
                  for($k=0;$k<count($bet_naga);$k++){
                    if($bet==$bet_naga[$k]){
                      $jumlah_naga[$k] += $jumlah_bet;
                      if($jumlah_naga[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet NAGA melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet NAGA melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'KELINCI') !== false){
                  for($k=0;$k<count($bet_kelinci);$k++){
                    if($bet==$bet_kelinci[$k]){
                      $jumlah_kelinci[$k] += $jumlah_bet;
                      if($jumlah_kelinci[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KELINCI melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KELINCI melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'HARIMAU') !== false){
                  for($k=0;$k<count($bet_harimau);$k++){
                    if($bet==$bet_harimau[$k]){
                      $jumlah_harimau[$k] += $jumlah_bet;
                      if($jumlah_harimau[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet HARIMAU melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet HARIMAU melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'KERBAU') !== false){
                  for($k=0;$k<count($bet_kerbau);$k++){
                    if($bet==$bet_kerbau[$k]){
                      $jumlah_kerbau[$k] += $jumlah_bet;
                      if($jumlah_kerbau[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KERBAU melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KERBAU melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'TIKUS') !== false){
                  for($k=0;$k<count($bet_tikus);$k++){
                    if($bet==$bet_tikus[$k]){
                      $jumlah_tikus[$k] += $jumlah_bet;
                      if($jumlah_tikus[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet TIKUS melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet TIKUS melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'BABI') !== false){
                  for($k=0;$k<count($bet_babi);$k++){
                    if($bet==$bet_babi[$k]){
                      $jumlah_babi[$k] += $jumlah_bet;
                      if($jumlah_babi[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet BABI melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet BABI melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_shio']/100));
                  }
                }else if(strpos($bet, 'BESAR') !== false){
                  for($k=0;$k<count($bet_besar);$k++){
                    if($bet==$bet_besar[$k]){
                      $jumlah_besar[$k] += $jumlah_bet;
                      if($jumlah_besar[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet BESAR melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet BESAR melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                  }
                }else if(strpos($bet, 'KECIL') !== false){
                  for($k=0;$k<count($bet_kecil);$k++){
                    if($bet==$bet_kecil[$k]){
                      $jumlah_kecil[$k] += $jumlah_bet;
                      if($jumlah_kecil[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KECIL melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KECIL melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                  }
                }else if(strpos($bet, 'GENAP') !== false){
                  for($k=0;$k<count($bet_genap);$k++){
                    if($bet==$bet_genap[$k]){
                      $jumlah_genap[$k] += $jumlah_bet;
                      if($jumlah_genap[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet GENAP melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet GENAP melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                  }
                }else if(strpos($bet, 'GANJIL') !== false){
                  for($k=0;$k<count($bet_ganjil);$k++){
                    if($bet==$bet_ganjil[$k]){
                      $jumlah_ganjil[$k] += $jumlah_bet;
                      if($jumlah_ganjil[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet GANJIL melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet GANJIL melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet + ($jumlah_bet * $row_cek['pajak_bkgg']/100));
                  }
                }else if(strpos($bet, 'BESARGANJIL') !== false){
                  for($k=0;$k<count($bet_besarganjil);$k++){
                    if($bet==$bet_besarganjil[$k]){
                      $jumlah_besarganjil[$k] += $jumlah_bet;
                      if($jumlah_besarganjil[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet BESARGANJIL melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet BESARGANJIL melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                  }
                }else if(strpos($bet, 'BESARGENAP') !== false){
                  for($k=0;$k<count($bet_besargenap);$k++){
                    if($bet==$bet_besargenap[$k]){
                      $jumlah_besargenap[$k] += $jumlah_bet;
                      if($jumlah_besargenap[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet BESARGENAP melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet BESARGENAP melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                  }
                }else if(strpos($bet, 'KECILGANJIL') !== false){
                  for($k=0;$k<count($bet_kecilganjil);$k++){
                    if($bet==$bet_kecilganjil[$k]){
                      $jumlah_kecilganjil[$k] += $jumlah_bet;
                      if($jumlah_kecilganjil[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KECILGANJIL melebihi maksimal');
                          </script>
                        ";
                      }
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                    }
                    $cek_bet = 1;
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KECILGANJIL melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                  }
                }else if(strpos($bet, 'KECILGENAP') !== false){
                  for($k=0;$k<count($bet_kecilgenap);$k++){
                    if($bet==$bet_kecilgenap[$k]){
                      $jumlah_kecilgenap[$k] += $jumlah_bet;
                      if($jumlah_kecilgenap[$k] > $row_cek['max_bet_other']){
                        echo "
                          <script>
                            alert('Jumlah bet KECILGENAP melebihi maksimal');
                          </script>
                        ";
                      }
                      $cek_bet = 1;
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                    }
                  }
                  if($cek_bet==0){
                    if($jumlah_bet > $row_cek['max_bet_other']){
                      echo "
                        <script>
                          alert('Jumlah bet KECILGENAP melebihi maksimal');
                        </script>
                      ";
                    }
                    $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_mkts']/100));
                  }
                }else if(strpos($bet, 'BB2') !== false){
                  $n = strlen(substr($bet, 3));
                  if($n<2||$n>8){
                    echo "
                      <script>
                        alert('Bet BB2 hanya memasukkan 2-8 angka');
                      </script>
                    ";
                  }
                  permute(substr($bet, 3), 0, $n - 1);
                  for($l=0;$l<count($temp_bb);$l++){
                    $cek_bet = 0;
                    for($k=0;$k<count($bet_2d);$k++){
                      if($temp_bb[$l]==$bet_2d[$k]){
                        $jumlah_2d[$k] += $jumlah_bet;
                        if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                          echo "
                    				<script>
                    					alert('Jumlah bet 2D melebihi maksimal');
                    				</script>
                    			";
                        }
                        $cek_bet = 1;
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                      }
                    }
                    for($k=0;$k<count($bet_bb2);$k++){
                      $m = strlen(substr($bet_bb2[$k], 3));
                      permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($temp_bb[$l]==$temp_bb_cek[$o]){
                          $jumlah_bb2[$k] += $jumlah_bet;
                          if($jumlah_bb2[$k] > $row_cek['max_bet_2d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 2D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                        }
                      }
                    }
                    if($cek_bet==0){
                      if($jumlah_bet > $row_cek['max_bet_2d']){
                        echo "
                          <script>
                            alert('Jumlah bet 2D melebihi maksimal');
                          </script>
                        ";
                      }
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                    }
                  }
                }else if(strpos($bet, 'BB3') !== false){
                  $n = strlen(substr($bet, 3));
                  if($n<3||$n>8){
                    echo "
                      <script>
                        alert('Bet BB3 hanya memasukkan 3-8 angka');
                      </script>
                    ";
                  }
                  permute(substr($bet, 3), 0, $n - 1);
                  for($l=0;$l<count($temp_bb);$l++){
                    $cek_bet = 0;
                    for($k=0;$k<count($bet_3d);$k++){
                      if($temp_bb[$l]==$bet_3d[$k]){
                        $jumlah_3d[$k] += $jumlah_bet;
                        if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                          echo "
                    				<script>
                    					alert('Jumlah bet 3D melebihi maksimal');
                    				</script>
                    			";
                        }
                        $cek_bet = 1;
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                      }
                    }
                    for($k=0;$k<count($bet_bb3);$k++){
                      $m = strlen(substr($bet_bb3[$k], 3));
                      permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($temp_bb[$l]==$temp_bb_cek[$o]){
                          $jumlah_bb3[$k] += $jumlah_bet;
                          if($jumlah_bb3[$k] > $row_cek['max_bet_3d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 3D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                        }
                      }
                    }
                    if($cek_bet==0){
                      if($jumlah_bet > $row_cek['max_bet_3d']){
                        echo "
                          <script>
                            alert('Jumlah bet 3D melebihi maksimal');
                          </script>
                        ";
                      }
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                    }
                  }
                }else if(strpos($bet, 'BB4') !== false){
                  $n = strlen(substr($bet, 3));
                  if($n<4||$n>8){
                    echo "
                      <script>
                        alert('Bet BB4 hanya memasukkan 4-8 angka');
                      </script>
                    ";
                  }
                  permute(substr($bet, 3), 0, $n - 1);
                  for($l=0;$l<count($temp_bb);$l++){
                    $cek_bet = 0;
                    for($k=0;$k<count($bet_4d);$k++){
                      if($temp_bb[$l]==$bet_4d[$k]){
                        $jumlah_4d[$k] += $jumlah_bet;
                        if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                          echo "
                    				<script>
                    					alert('Jumlah bet 4D melebihi maksimal');
                    				</script>
                    			";
                        }
                        $cek_bet = 1;
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                      }
                    }
                    for($k=0;$k<count($bet_bb4);$k++){
                      $m = strlen(substr($bet_bb4[$k], 3));
                      permute2(substr($bet_bb4[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($temp_bb[$l]==$temp_bb_cek[$o]){
                          $jumlah_bb4[$k] += $jumlah_bet;
                          if($jumlah_bb4[$k] > $row_cek['max_bet_4d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 4D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                        }
                      }
                    }
                    if($cek_bet==0){
                      if($jumlah_bet > $row_cek['max_bet_4d']){
                        echo "
                          <script>
                            alert('Jumlah bet 4D melebihi maksimal');
                          </script>
                        ";
                      }
                      $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                    }
                  }
                }else if(strpos($bet, 'BBSET') !== false){
                  $n = strlen(substr($bet, 3));
                  if($n<4||$n>8){
                    echo "
                      <script>
                        alert('Bet BBSET hanya memasukkan 4-8 angka');
                      </script>
                    ";
                  }
                  permute(substr($bet, 3), 0, $n - 1);
                  if(strpos($jumlah_bet, '/') !== false){
                    $bbset_temp = explode($jumlah_bet, '/');
                    for($l=0;$l<count($temp_bb);$l++){
                      $cek_bet = 0;
                      for($k=0;$k<count($bet_2d);$k++){
                        if($temp_bb[$l]==$bet_2d[$k]){
                          $jumlah_2d[$k] += $bbset_temp[0];
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 2D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($bbset_temp[0] - ($bbset_temp[0] * $row_cek['diskon_2d']/100));
                        }
                      }
                      for($k=0;$k<count($bet_bb2);$k++){
                        $m = strlen(substr($bet_bb2[$k], 3));
                        permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                        for($o=0;$o<count($temp_bb_cek);$o++){
                          if($temp_bb[$l]==$temp_bb_cek[$o]){
                            $jumlah_bb2[$k] += $bbset_temp[0];
                            if($jumlah_bb2[$k] > $row_cek['max_bet_2d']){
                              echo "
                        				<script>
                        					alert('Jumlah bet 2D melebihi maksimal');
                        				</script>
                        			";
                            }
                            $cek_bet = 1;
                            $credit_sisa = $credit_sisa - ($bbset_temp[0] - ($bbset_temp[0] * $row_cek['diskon_2d']/100));
                          }
                        }
                      }
                      if($cek_bet==0){
                        if($bbset_temp[0] > $row_cek['max_bet_2d']){
                          echo "
                            <script>
                              alert('Jumlah bet 2D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($bbset_temp[0] - ($bbset_temp[0] * $row_cek['diskon_2d']/100));
                      }
                    }
                    for($l=0;$l<count($temp_bb);$l++){
                      $cek_bet = 0;
                      for($k=0;$k<count($bet_3d);$k++){
                        if($temp_bb[$l]==$bet_3d[$k]){
                          $jumlah_3d[$k] += $bbset_temp[1];
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 3D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($bbset_temp[1] - ($bbset_temp[1] * $row_cek['diskon_3d']/100));
                        }
                      }
                      for($k=0;$k<count($bet_bb3);$k++){
                        $m = strlen(substr($bet_bb3[$k], 3));
                        permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                        for($o=0;$o<count($temp_bb_cek);$o++){
                          if($temp_bb[$l]==$temp_bb_cek[$o]){
                            $jumlah_bb3[$k] += $bbset_temp[1];
                            if($jumlah_bb3[$k] > $row_cek['max_bet_3d']){
                              echo "
                        				<script>
                        					alert('Jumlah bet 3D melebihi maksimal');
                        				</script>
                        			";
                            }
                            $cek_bet = 1;
                            $credit_sisa = $credit_sisa - ($bbset_temp[1] - ($bbset_temp[1] * $row_cek['diskon_3d']/100));
                          }
                        }
                      }
                      if($cek_bet==0){
                        if($bbset_temp[1] > $row_cek['max_bet_3d']){
                          echo "
                            <script>
                              alert('Jumlah bet 3D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($bbset_temp[1] - ($bbset_temp[1] * $row_cek['diskon_3d']/100));
                      }
                    }
                    for($l=0;$l<count($temp_bb);$l++){
                      $cek_bet = 0;
                      for($k=0;$k<count($bet_4d);$k++){
                        if($temp_bb[$l]==$bet_4d[$k]){
                          $jumlah_4d[$k] += $bbset_temp[2];
                          if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 4D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($bbset_temp[2] - ($bbset_temp[2] * $row_cek['diskon_4d']/100));
                        }
                      }
                      for($k=0;$k<count($bet_bb4);$k++){
                        $m = strlen(substr($bet_bb4[$k], 3));
                        permute2(substr($bet_bb4[$k], 3), 0, $m - 1);
                        for($o=0;$o<count($temp_bb_cek);$o++){
                          if($temp_bb[$l]==$temp_bb_cek[$o]){
                            $jumlah_bb4[$k] += $bbset_temp[2];
                            if($jumlah_bb4[$k] > $row_cek['max_bet_4d']){
                              echo "
                        				<script>
                        					alert('Jumlah bet 4D melebihi maksimal');
                        				</script>
                        			";
                            }
                            $cek_bet = 1;
                            $credit_sisa = $credit_sisa - ($bbset_temp[2] - ($bbset_temp[2] * $row_cek['diskon_4d']/100));
                          }
                        }
                      }
                      if($cek_bet==0){
                        if($bbset_temp[2] > $row_cek['max_bet_4d']){
                          echo "
                            <script>
                              alert('Jumlah bet 4D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($bbset_temp[2] - ($bbset_temp[2] * $row_cek['diskon_4d']/100));
                      }
                    }
                  }else{
                    for($l=0;$l<count($temp_bb);$l++){
                      $cek_bet = 0;
                      for($k=0;$k<count($bet_2d);$k++){
                        if($temp_bb[$l]==$bet_2d[$k]){
                          $jumlah_2d[$k] += $jumlah_bet;
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 2D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                        }
                      }
                      for($k=0;$k<count($bet_bb2);$k++){
                        $m = strlen(substr($bet_bb2[$k], 3));
                        permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                        for($o=0;$o<count($temp_bb_cek);$o++){
                          if($temp_bb[$l]==$temp_bb_cek[$o]){
                            $jumlah_bb2[$k] += $jumlah_bet;
                            if($jumlah_bb2[$k] > $row_cek['max_bet_2d']){
                              echo "
                        				<script>
                        					alert('Jumlah bet 2D melebihi maksimal');
                        				</script>
                        			";
                            }
                            $cek_bet = 1;
                            $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                          }
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_2d']){
                          echo "
                            <script>
                              alert('Jumlah bet 2D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                      }
                    }
                    permute(substr($bet, 3), 0, $n - 1);
                    for($l=0;$l<count($temp_bb);$l++){
                      $cek_bet = 0;
                      for($k=0;$k<count($bet_3d);$k++){
                        if($temp_bb[$l]==$bet_3d[$k]){
                          $jumlah_3d[$k] += $jumlah_bet;
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 3D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                        }
                      }
                      for($k=0;$k<count($bet_bb3);$k++){
                        $m = strlen(substr($bet_bb3[$k], 3));
                        permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                        for($o=0;$o<count($temp_bb_cek);$o++){
                          if($temp_bb[$l]==$temp_bb_cek[$o]){
                            $jumlah_bb3[$k] += $jumlah_bet;
                            if($jumlah_bb3[$k] > $row_cek['max_bet_3d']){
                              echo "
                        				<script>
                        					alert('Jumlah bet 3D melebihi maksimal');
                        				</script>
                        			";
                            }
                            $cek_bet = 1;
                            $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                          }
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_3d']){
                          echo "
                            <script>
                              alert('Jumlah bet 3D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                      }
                    }
                    permute(substr($bet, 3), 0, $n - 1);
                    for($l=0;$l<count($temp_bb);$l++){
                      $cek_bet = 0;
                      for($k=0;$k<count($bet_4d);$k++){
                        if($temp_bb[$l]==$bet_4d[$k]){
                          $jumlah_4d[$k] += $jumlah_bet;
                          if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                            echo "
                      				<script>
                      					alert('Jumlah bet 4D melebihi maksimal');
                      				</script>
                      			";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                        }
                      }
                      for($k=0;$k<count($bet_bb4);$k++){
                        $m = strlen(substr($bet_bb4[$k], 3));
                        permute2(substr($bet_bb4[$k], 3), 0, $m - 1);
                        for($o=0;$o<count($temp_bb_cek);$o++){
                          if($temp_bb[$l]==$temp_bb_cek[$o]){
                            $jumlah_bb4[$k] += $jumlah_bet;
                            if($jumlah_bb4[$k] > $row_cek['max_bet_4d']){
                              echo "
                        				<script>
                        					alert('Jumlah bet 4D melebihi maksimal');
                        				</script>
                        			";
                            }
                            $cek_bet = 1;
                            $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                          }
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_4d']){
                          echo "
                            <script>
                              alert('Jumlah bet 4D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                      }
                    }
                  }
                }else if(strpos($bet, 'SET') !== false){
                  $n = strlen(substr($bet, 3));
                  if($n<3||$n>4){
                    echo "
                      <script>
                        alert('Bet SET hanya memasukkan 3-4 angka');
                      </script>
                    ";
                  }
                  if(strpos($jumlah_bet, '/') !== false){
                    if($n==4){
                      $set_temp_4d = substr($bet, 3);
                      $set_temp_3d = substr($set_temp_4d, 1);
                      $set_temp_2d = substr($set_temp_3d, 1);
                      $jumlah_set_temp = explode($jumlah_bet, '/');
                      for($k=0;$k<count($bet_2d);$k++){
                        if($set_temp_2d==$bet_2d[$k]){
                          $jumlah_2d[$k] += $jumlah_set_temp[0];
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                              <script>
                                alert('Jumlah bet 2D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_set_temp[0] - ($jumlah_set_temp[0] * $row_cek['diskon_2d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb2[$k], 3));
                      permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_2d==$temp_bb_cek[$o]){
                          $jumlah_2d[$k] += $jumlah_set_temp[0];
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                              <script>
                                alert('Jumlah bet 2D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_set_temp[0] - ($jumlah_set_temp[0] * $row_cek['diskon_2d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_set_temp[0] > $row_cek['max_bet_2d']){
                          echo "
                            <script>
                              alert('Jumlah bet 2D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_set_temp[0] - ($jumlah_set_temp[0] * $row_cek['diskon_2d']/100));
                      }
                      for($k=0;$k<count($bet_3d);$k++){
                        if($set_temp_3d==$bet_3d[$k]){
                          $jumlah_3d[$k] += $jumlah_set_temp[1];
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                              <script>
                                alert('Jumlah bet 3D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_set_temp[1] - ($jumlah_set_temp[1] * $row_cek['diskon_3d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb3[$k], 3));
                      permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_3d==$temp_bb_cek[$o]){
                          $jumlah_3d[$k] += $jumlah_set_temp[1];
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                              <script>
                                alert('Jumlah bet 3D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_set_temp[1] - ($jumlah_set_temp[1] * $row_cek['diskon_3d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_set_temp[1] > $row_cek['max_bet_3d']){
                          echo "
                            <script>
                              alert('Jumlah bet 3D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_set_temp[1] - ($jumlah_set_temp[1] * $row_cek['diskon_3d']/100));
                      }

                      for($k=0;$k<count($bet_4d);$k++){
                        if($set_temp_4d==$bet_4d[$k]){
                          $jumlah_4d[$k] += $jumlah_set_temp[2];
                          if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                            echo "
                              <script>
                                alert('Jumlah bet 4D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_set_temp[2] - ($jumlah_set_temp[2] * $row_cek['diskon_4d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb4[$k], 3));
                      permute2(substr($bet_bb4[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_4d==$temp_bb_cek[$o]){
                          $jumlah_4d[$k] += $jumlah_set_temp[2];
                          if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                            echo "
                              <script>
                                alert('Jumlah bet 4D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_set_temp[2] - ($jumlah_set_temp[2] * $row_cek['diskon_4d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_set_temp[2] > $row_cek['max_bet_4d']){
                          echo "
                            <script>
                              alert('Jumlah bet 4D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_set_temp[2] - ($jumlah_set_temp[2] * $row_cek['diskon_4d']/100));
                      }
                    }else{
                      echo "
                        <script>
                          alert('Bet SET Kombinasi hanya memasukkan 4 angka');
                        </script>
                      ";
                    }
                  }else{
                    if($n==4){
                      $set_temp_4d = substr($bet, 3);
                      $set_temp_3d = substr($set_temp_4d, 1);
                      $set_temp_2d = substr($set_temp_3d, 1);
                      for($k=0;$k<count($bet_2d);$k++){
                        if($set_temp_2d==$bet_2d[$k]){
                          $jumlah_2d[$k] += $jumlah_bet;
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                              <script>
                                alert('Jumlah bet 2D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb2[$k], 3));
                      permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_2d==$temp_bb_cek[$o]){
                          $jumlah_2d[$k] += $jumlah_bet;
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                              <script>
                                alert('Jumlah bet 2D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_2d']){
                          echo "
                            <script>
                              alert('Jumlah bet 2D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                      }

                      for($k=0;$k<count($bet_3d);$k++){
                        if($set_temp_3d==$bet_3d[$k]){
                          $jumlah_3d[$k] += $jumlah_bet;
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                              <script>
                                alert('Jumlah bet 3D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb3[$k], 3));
                      permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_3d==$temp_bb_cek[$o]){
                          $jumlah_3d[$k] += $jumlah_bet;
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                              <script>
                                alert('Jumlah bet 3D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_3d']){
                          echo "
                            <script>
                              alert('Jumlah bet 3D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                      }

                      for($k=0;$k<count($bet_4d);$k++){
                        if($set_temp_4d==$bet_4d[$k]){
                          $jumlah_4d[$k] += $jumlah_bet;
                          if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                            echo "
                              <script>
                                alert('Jumlah bet 4D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb4[$k], 3));
                      permute2(substr($bet_bb4[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_4d==$temp_bb_cek[$o]){
                          $jumlah_4d[$k] += $jumlah_bet;
                          if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
                            echo "
                              <script>
                                alert('Jumlah bet 4D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_4d']){
                          echo "
                            <script>
                              alert('Jumlah bet 4D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
                      }
                    }else{
                      $set_temp_3d = substr($bet, 3);
                      $set_temp_2d = substr($set_temp_3d, 1);
                      for($k=0;$k<count($bet_2d);$k++){
                        if($set_temp_2d==$bet_2d[$k]){
                          $jumlah_2d[$k] += $jumlah_bet;
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                              <script>
                                alert('Jumlah bet 2D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb2[$k], 3));
                      permute2(substr($bet_bb2[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_2d==$temp_bb_cek[$o]){
                          $jumlah_2d[$k] += $jumlah_bet;
                          if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
                            echo "
                              <script>
                                alert('Jumlah bet 2D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_2d']){
                          echo "
                            <script>
                              alert('Jumlah bet 2D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_2d']/100));
                      }

                      for($k=0;$k<count($bet_3d);$k++){
                        if($set_temp_3d==$bet_3d[$k]){
                          $jumlah_3d[$k] += $jumlah_bet;
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                              <script>
                                alert('Jumlah bet 3D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                        }
                      }
                      $m = strlen(substr($bet_bb3[$k], 3));
                      permute2(substr($bet_bb3[$k], 3), 0, $m - 1);
                      for($o=0;$o<count($temp_bb_cek);$o++){
                        if($set_temp_3d==$temp_bb_cek[$o]){
                          $jumlah_3d[$k] += $jumlah_bet;
                          if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
                            echo "
                              <script>
                                alert('Jumlah bet 3D melebihi maksimal');
                              </script>
                            ";
                          }
                          $cek_bet = 1;
                          $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                        }
                      }
                      if($cek_bet==0){
                        if($jumlah_bet > $row_cek['max_bet_3d']){
                          echo "
                            <script>
                              alert('Jumlah bet 3D melebihi maksimal');
                            </script>
                          ";
                        }
                        $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_3d']/100));
                      }
                    }
                  }
                }
              }
              if($row_cek['credit'] < $jumlah_bet){
                echo "
            			<script>
            				alert('Credit tidak cukup');
            			</script>
            		";
              }
              if(is_null($row_cek['used_credit'])){
                $total_used_credit = $jumlah_bet;
              }else{
                $total_used_credit = $row_cek['used_credit'] + $jumlah_bet;
              }
              $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
              mysqli_query($conn, $sql_credit);
              mysqli_query($conn, $sql);
            }
          }
        }else{
          echo "
    				<script>
    					alert('Format yang anda gunakan tidak sesuai');
    				</script>
    			";
        }
      }else{
        echo "
          <script>
            alert('Format yang anda gunakan tidak sesuai');
          </script>
        ";
      }
  	}
    echo "
      <script>
        alert('Bet berhasil dilakukan');
      </script>
    ";
  }else{
    echo "
      <script>
        alert('Permainan telah selesai');
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

function permute2($str, $l, $r)
{
    if ($l == $r)
        array_push($temp_bb_cek, $str);
    else
    {
        for ($i = $l; $i <= $r; $i++)
        {
            $str = swap2($str, $l, $i);
            permute2($str, $l + 1, $r);
            $str = swap2($str, $l, $i);
        }
    }
}

function swap2($a, $i, $j)
{
    $temp;
    $charArray = str_split($a);
    $temp = $charArray[$i] ;
    $charArray[$i] = $charArray[$j];
    $charArray[$j] = $temp;
    return implode($charArray);
}
?>
<script>
function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
</script>
