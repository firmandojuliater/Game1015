<div class="modal hide fade" id="addnew">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>BET</h3>
  </div>
  <div class="modal-body">
    <div class="container-fluid">
    <form method="POST" action="#">
				<div class="row-fluid">
					<div class="span12">
						<label>Masukkan BET</label>
						<textarea name="input" id="input" cols="10" rows="6" onkeydown="upperCaseF(this)"  class="span12"></textarea>
					</div>
				</div>
      </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="submit" value="Save" class="btn btn-success">Submit</a></button>
  </div>
</form>
</div>
<?php
if(isset($_POST['submit'])){
  //Mengecek permainan apakah sedang dimulai
  $sql = "SELECT * FROM tb_permainan WHERE status = 1";
  $query = mysqli_query($conn, $sql);
  $jumlah= "";
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
        			break;
            }
          }
        }else if(preg_match_all('![A-WY-Z]+!', $output[$i])){
          if(is_numeric($output[$i+1])){
                if(preg_match('(ANJING|AYAM|MONYET|KAMBING|KUDA|ULAR|NAGA|KELINCI|HARIMAU|KERBAU|TIKUS|BABI|BESAR|KECIL|GENAP|GANJIL|BESARGANJIL|BESARGENAP|KECILGANJIL|KECILGENAP)', $output[$i]) === 1) {
                    $array_temp = $array_temp.$output[$i].",";
                }else{
                    $array_temp = $array_temp.$output[$i].",";
                    $array_temp=rtrim($array_temp,',');
                }
          }else{
            $array_temp = $array_temp.$output[$i].",";
          }
        }else{
            if($output[$i-1]=='BB'){
                $array_temp = $array_temp.$output[$i];
            }else{
                $array_temp = $array_temp.$output[$i].",";
            }
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
  			break;
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
			$bet = $jumlah[0];
			$jumlah_bet = $jumlah[1];
			$username = $_SESSION['username'];
			$sql_bet = "SELECT * FROM tb_bet WHERE username_member = '$username' AND id_permainan=(SELECT MAX(id_permainan) FROM tb_permainan) GROUP BY 'bet'";
			$query_bet = mysqli_query($conn, $sql_bet);
			while($row_bet = mysqli_fetch_array($query_bet)){
			  if(is_numeric($row_bet['bet'])){
				if($row_bet['bet'] < 100){
				  array_push($bet_2d, $row_bet['bet']);
				  array_push($jumlah_2d, $row_bet['jumlah_bet']);
				}else if($row_bet['bet'] < 1000){
				  array_push($bet_3d, $row_bet['bet']);
				  array_push($jumlah_3d, $row_bet['jumlah_bet']);
				}else if($row_bet['bet'] < 10000){
				  array_push($bet_4d, $row_bet['bet']);
				  array_push($jumlah_4d, $row_bet['jumlah_bet']);
				}
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
				}
			  }
			}
			//Mengecek format bet
			if(is_numeric($bet)){
			  if(!($bet >= 0 && $bet < 10000)){
				echo "
						<script>
							alert('Format yang anda gunakan tidak sesuai');
						</script>
					";
					break;
			  }
			}
			if(strpos($jumlah_bet, '/') !== true){
				if($jumlah_bet < 1){
					echo "
					  <script>
						alert('Jumlah bet kurang dari bet minimal');
					  </script>
					";
					break;
				  }
			}
			if(strpos($bet, ',') !== false){
			  $bet = explode(",", $bet);
			  $jumlah_loop = count($bet);
			}else{
			    $jumlah_loop = 1;
			}
			
			for($h=0;$h<$jumlah_loop;$h++){
			  $sql_cek = "SELECT * FROM tb_user WHERE username = '$username'";
			  $query_cek = mysqli_query($conn, $sql_cek);
			  $row_cek = mysqli_fetch_array($query_cek);
			  $credit_sisa=$row_cek['credit'];
			  $cek_bet = 0;
			  $temp_bb = array();
			  if($jumlah_loop==1){
			      $bet_array = $bet;
			  }else{
			      $bet_array = $bet[$h];
			  }

			  if(is_numeric($bet_array)){
				if($bet_array >= 0 && $bet_array < 100){
				  for($k=0;$k<count($bet_array_2d);$k++){
					if($bet_array==$bet_2d[$k]){
					  $jumlah_2d[$k] += $jumlah_bet;
					  if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
						echo "
								<script>
									alert('Jumlah bet 2D melebihi maksimal');
								</script>
							";
							break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_2d']){
					  echo "
						<script>
						  alert('Jumlah bet 2D melebihi maksimal');
						</script>
					  ";
					  break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_2d'];
				  $posisi = "2D";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array < 1000){
				  for($k=0;$k<count($bet_3d);$k++){
					if($bet_array==$bet_3d[$k]){
					  $jumlah_3d[$k] += $jumlah_bet;
					  if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
						echo "
								<script>
									alert('Jumlah bet 3D melebihi maksimal');
								</script>
							";
							break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_3d']){
					  echo "
						<script>
						  alert('Jumlah bet 3D melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_3d'];
				  $posisi = "3D";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array < 10000){
				  for($k=0;$k<count($bet_4d);$k++){
					if($bet_array==$bet_4d[$k]){
					  $jumlah_4d[$k] += $jumlah_bet;
					  if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
						echo "
								<script>
									alert('Jumlah bet 4D melebihi maksimal');
								</script>
							";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_4d']){
					  echo "
						<script>
						  alert('Jumlah bet 4D melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_4d'];
				  $posisi = "4D";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else{
				    echo "
						<script>
							alert('Format yang anda gunakan tidak sesuai');
						</script>
					";
					break;
				}
				if($credit_sisa < 0){
				    echo "
						<script>
							alert('Credit tidak cukup');
						</script>
					";break;
			    }
			    if(is_null($row_cek['used_credit'])){
				    $total_used_credit = $row_cek['credit'] - $credit_sisa;
			    }else{
				    $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
			    }
			    $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$bet_array', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
			    $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
			    mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
   			    mysqli_query($conn, $sql) OR DIE (mysqli_error());
			  }else if(preg_match('(BB|SET)', $bet_array) === 1){
			    if(strpos($bet_array, 'BB2') !== false){
				  $n = strlen(substr($bet_array, 3));
				  if($n<2||$n>8){
					echo "
					  <script>
						alert('Bet BB2 hanya memasukkan 2-8 angka');
					  </script>
					";break;
				  }
				  $array_bb = str_split(substr($bet_array, 3));
				  $bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 2))));
				  foreach($bb_list as $temp_bb){
				    if(!empty($temp_bb)){
				        $cek_bet = 0;
    					for($k=0;$k<count($bet_2d);$k++){
    					  if($temp_bb==$bet_2d[$k]){
    						$jumlah_2d[$k] += $jumlah_bet;
    						if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
    						  echo "
    									<script>
    										alert('Jumlah bet 2D melebihi maksimal');
    									</script>
    								";break;
    						}
    						$cek_bet = 1;
    					  }
    					}
    					if($cek_bet==0){
    					  if($jumlah_bet > $row_cek['max_bet_2d']){
    						echo "
    						  <script>
    							alert('Jumlah bet 2D melebihi maksimal');
    						  </script>
    						";break;
    					  }
    					}
    					$diskon_bet = $row_cek['diskon_2d'];
				        $posisi = "2D";
			            $potongan_bet = $jumlah_bet * $diskon_bet/100;
				        $total_bet = $jumlah_bet + $potongan_bet;
				        $credit_sisa = $credit_sisa - $total_bet;
    					if($credit_sisa < 0){
    				        echo "
    						    <script>
    							    alert('Credit tidak cukup');
    						    </script>
    					    ";break;
    			        }
    			        if(is_null($row_cek['used_credit'])){
    				        $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			        }else{
    				        $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			        }
    			        $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    			        $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    			        mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    			        mysqli_query($conn, $sql) OR DIE (mysqli_error());
				    }
				  }
				}else if(strpos($bet_array, 'BB3') !== false){
				  $n = strlen(substr($bet_array, 3));
				  if($n<3||$n>8){
					echo "
					  <script>
						alert('Bet BB3 hanya memasukkan 3-8 angka');
					  </script>
					";break;
				  }
				  $array_bb = str_split(substr($bet_array, 3));
				  $bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 3))));
				  foreach($bb_list as $temp_bb){
				    if(!empty($temp_bb)){
				        $cek_bet = 0;
    					for($k=0;$k<count($bet_3d);$k++){
    					  if($temp_bb==$bet_3d[$k]){
    						$jumlah_3d[$k] += $jumlah_bet;
    						if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
    						  echo "
    									<script>
    										alert('Jumlah bet 3D melebihi maksimal');
    									</script>
    								";break;
    						}
    						$cek_bet = 1;
    					  }
    					}
    					if($cek_bet==0){
    					  if($jumlah_bet > $row_cek['max_bet_3d']){
    						echo "
    						  <script>
    							alert('Jumlah bet 3D melebihi maksimal');
    						  </script>
    						";break;
    					  }
    					}
    					$diskon_bet = $row_cek['diskon_3d'];
				        $posisi = "3D";
			            $potongan_bet = $jumlah_bet * $diskon_bet/100;
				        $total_bet = $jumlah_bet + $potongan_bet;
				        $credit_sisa = $credit_sisa - $total_bet;
    					if($credit_sisa < 0){
    				        echo "
    						    <script>
    							    alert('Credit tidak cukup');
    						    </script>
    					    ";break;
    			        }
    			        if(is_null($row_cek['used_credit'])){
    				        $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			        }else{
    				        $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			        }
    			        $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    			        $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    			        mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    			        mysqli_query($conn, $sql) OR DIE (mysqli_error());
				    }
				  }
				}else if(strpos($bet_array, 'BB4') !== false){
				  $n = strlen(substr($bet_array, 3));
				  if($n<4||$n>8){
					echo "
					  <script>
						alert('Bet BB4 hanya memasukkan 4-8 angka');
					  </script>
					";break;
				  }
				  $array_bb = str_split(substr($bet_array, 3));
				  $bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 4))));
				  foreach($bb_list as $temp_bb){
				    if(!empty($temp_bb)){
				        $cek_bet = 0;
    					for($k=0;$k<count($bet_4d);$k++){
    					  if($temp_bb==$bet_4d[$k]){
    						$jumlah_4d[$k] += $jumlah_bet;
    						if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
    						  echo "
    									<script>
    										alert('Jumlah bet 4D melebihi maksimal');
    									</script>
    								";break;
    						}
    						$cek_bet = 1;
    					  }
    					}
    					if($cek_bet==0){
    					  if($jumlah_bet > $row_cek['max_bet_4d']){
    						echo "
    						  <script>
    							alert('Jumlah bet 4D melebihi maksimal');
    						  </script>
    						";break;
    					  }
    					}
    					$diskon_bet = $row_cek['diskon_4d'];
				        $posisi = "4D";
			            $potongan_bet = $jumlah_bet * $diskon_bet/100;
				        $total_bet = $jumlah_bet + $potongan_bet;
				        $credit_sisa = $credit_sisa - $total_bet;
    					if($credit_sisa < 0){
    				        echo "
    						    <script>
    							    alert('Credit tidak cukup');
    						    </script>
    					    ";break;
    			        }
    			        if(is_null($row_cek['used_credit'])){
    				        $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			        }else{
    				        $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			        }
    			        $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    			        $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    			        mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    			        mysqli_query($conn, $sql) OR DIE (mysqli_error());
				    }
				  }
				}else if(strpos($bet_array, 'BBSET') !== false){
				  $n = strlen(substr($bet_array, 5));
				  if($n<4||$n>8){
					echo "
					  <script>
						alert('Bet BB4 hanya memasukkan 4-8 angka');
					  </script>
					";break;
				  }
				  if(strpos($jumlah_bet, '/') !== false){
					$bbset_temp = explode($jumlah_bet, '/');
					$array_bb = str_split(substr($bet_array, 5));
					$bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 2))));
				    foreach($bb_list as $temp_bb){
					    if(!empty($temp_bb)){
				            $cek_bet = 0;
    						for($k=0;$k<count($bet_2d);$k++){
    						  if($temp_bb==$bet_2d[$k]){
    							$jumlah_2d[$k] += $bbset_temp[0];
    							if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
    							  echo "
    										<script>
    											alert('Jumlah bet 2D melebihi maksimal');
    										</script>
    									";break;
    							}
    							$cek_bet = 1;
    						  }
    						}
    						if($cek_bet==0){
    						  if($bbset_temp[0] > $row_cek['max_bet_2d']){
    							echo "
    							  <script>
    								alert('Jumlah bet 2D melebihi maksimal');
    							  </script>
    							";break;
    						  }
    						}
    					    $diskon_bet = $row_cek['diskon_2d'];
				            $posisi = "2D";
			                $potongan_bet = $bbset_temp[0] * $diskon_bet/100;
				            $total_bet = $bbset_temp[0] + $potongan_bet;
				            $credit_sisa = $credit_sisa - $total_bet;
    					    if($credit_sisa < 0){
    				            echo "
    						        <script>
    							        alert('Credit tidak cukup');
    						        </script>
    					        ";break;
    			            }
    			            if(is_null($row_cek['used_credit'])){
    				            $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			            }else{
    				            $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			            }
    			            $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$bbset_temp[0]', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    						$sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    						mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    						mysqli_query($conn, $sql) OR DIE (mysqli_error());
				        }
					}
					$bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 3))));
				    foreach($bb_list as $temp_bb){
					    if(!empty($temp_bb)){
				            $cek_bet = 0;
    						for($k=0;$k<count($bet_3d);$k++){
    						  if($temp_bb==$bet_3d[$k]){
    							$jumlah_3d[$k] += $bbset_temp[1];
    							if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
    							  echo "
    										<script>
    											alert('Jumlah bet 3D melebihi maksimal');
    										</script>
    									";break;
    							}
    							$cek_bet = 1;
    						  }
    						}
    						if($cek_bet==0){
    						  if($bbset_temp[1] > $row_cek['max_bet_3d']){
    							echo "
    							  <script>
    								alert('Jumlah bet 3D melebihi maksimal');
    							  </script>
    							";break;
    						  }
    						}
    						$diskon_bet = $row_cek['diskon_3d'];
				            $posisi = "3D";
			                $potongan_bet = $bbset_temp[1] * $diskon_bet/100;
				            $total_bet = $bbset_temp[1] + $potongan_bet;
				            $credit_sisa = $credit_sisa - $total_bet;
    					    if($credit_sisa < 0){
    				            echo "
    						        <script>
    							        alert('Credit tidak cukup');
    						        </script>
    					        ";break;
    			            }
    			            if(is_null($row_cek['used_credit'])){
    				            $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			            }else{
    				            $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			            }
    			            $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$bbset_temp[1]', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    						$sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    						mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    						mysqli_query($conn, $sql) OR DIE (mysqli_error());
				        }
					}
					$bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 4))));
				    foreach($bb_list as $temp_bb){
					    if(!empty($temp_bb)){
				            $cek_bet = 0;
    						for($k=0;$k<count($bet_4d);$k++){
    						  if($temp_bb==$bet_4d[$k]){
    							$jumlah_4d[$k] += $bbset_temp[2];
    							if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
    							  echo "
    										<script>
    											alert('Jumlah bet 4D melebihi maksimal');
    										</script>
    									";break;
    							}
    							$cek_bet = 1;
    						  }
    						}
    						if($cek_bet==0){
    						  if($bbset_temp[2] > $row_cek['max_bet_4d']){
    							echo "
    							  <script>
    								alert('Jumlah bet 4D melebihi maksimal');
    							  </script>
    							";break;
    						  }
    						}
    						$diskon_bet = $row_cek['diskon_4d'];
				            $posisi = "4D";
			                $potongan_bet = $bbset_temp[2] * $diskon_bet/100;
				            $total_bet = $bbset_temp[2] + $potongan_bet;
				            $credit_sisa = $credit_sisa - $total_bet;
    					    if($credit_sisa < 0){
    				            echo "
    						        <script>
    							        alert('Credit tidak cukup');
    						        </script>
    					        ";break;
    			            }
    			            if(is_null($row_cek['used_credit'])){
    				            $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			            }else{
    				            $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			            }
    			            $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$bbset_temp[2]', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    						$sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    						mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    						mysqli_query($conn, $sql) OR DIE (mysqli_error());
				        }
					}
				  }else{
					$array_bb = str_split(substr($bet_array, 5));
					$bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 2))));
				    foreach($bb_list as $temp_bb){
					    if(!empty($temp_bb)){
				            $cek_bet = 0;
    						for($k=0;$k<count($bet_2d);$k++){
    						  if($temp_bb==$bet_2d[$k]){
    							$jumlah_2d[$k] += $jumlah_bet;
    							if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
    							  echo "
    										<script>
    											alert('Jumlah bet 2D melebihi maksimal');
    										</script>
    									";break;
    							}
    							$cek_bet = 1;
    						  }
    						}
    						if($cek_bet==0){
    						  if($jumlah_bet > $row_cek['max_bet_2d']){
    							echo "
    							  <script>
    								alert('Jumlah bet 2D melebihi maksimal');
    							  </script>
    							";break;
    						  }
    						}
    						$diskon_bet = $row_cek['diskon_2d'];
				            $posisi = "2D";
			                $potongan_bet = $jumlah_bet * $diskon_bet/100;
				            $total_bet = $jumlah_bet + $potongan_bet;
				            $credit_sisa = $credit_sisa - $total_bet;
    					    if($credit_sisa < 0){
    				            echo "
    						        <script>
    							        alert('Credit tidak cukup');
    						        </script>
    					        ";break;
    			            }
    			            if(is_null($row_cek['used_credit'])){
    				            $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			            }else{
    				            $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			            }
    			            $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    						$sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    						mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    						mysqli_query($conn, $sql) OR DIE (mysqli_error());
				        }
					}
					$bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 3))));
				    foreach($bb_list as $temp_bb){
					    if(!empty($temp_bb)){
				            $cek_bet = 0;
    						for($k=0;$k<count($bet_3d);$k++){
    						  if($temp_bb==$bet_3d[$k]){
    							$jumlah_3d[$k] += $jumlah_bet;
    							if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
    							  echo "
    										<script>
    											alert('Jumlah bet 3D melebihi maksimal');
    										</script>
    									";break;
    							}
    							$cek_bet = 1;
    						  }
    						}
    						if($cek_bet==0){
    						  if($jumlah_bet > $row_cek['max_bet_3d']){
    							echo "
    							  <script>
    								alert('Jumlah bet 3D melebihi maksimal');
    							  </script>
    							";break;
    						  }
    						}
    						$diskon_bet = $row_cek['diskon_3d'];
				            $posisi = "3D";
			                $potongan_bet = $jumlah_bet * $diskon_bet/100;
				            $total_bet = $jumlah_bet + $potongan_bet;
				            $credit_sisa = $credit_sisa - $total_bet;
    					    if($credit_sisa < 0){
    				            echo "
    						        <script>
    							        alert('Credit tidak cukup');
    						        </script>
    					        ";break;
    			            }
    			            if(is_null($row_cek['used_credit'])){
        				        $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			            }else{
        				        $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			            }
    			            $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
    						$sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
    						mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
    						mysqli_query($conn, $sql) OR DIE (mysqli_error());
				        }
					}
					$bb_list=array_unique(convert_multi_array(iterator_to_array(permutations($array_bb, 4))));
				    foreach($bb_list as $temp_bb){
					    if(!empty($temp_bb)){
				            $cek_bet = 0;
    						for($k=0;$k<count($bet_4d);$k++){
    						  if($temp_bb==$bet_4d[$k]){
    							$jumlah_4d[$k] += $jumlah_bet;
    							if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
    							  echo "
    										<script>
    											alert('Jumlah bet 4D melebihi maksimal');
    										</script>
    									";break;
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
    							";break;
    						  }
    						  $credit_sisa = $credit_sisa - ($jumlah_bet - ($jumlah_bet * $row_cek['diskon_4d']/100));
    						}
    						$diskon_bet = $row_cek['diskon_4d'];
				            $posisi = "4D";
			                $potongan_bet = $jumlah_bet * $diskon_bet/100;
				            $total_bet = $jumlah_bet + $potongan_bet;
				            $credit_sisa = $credit_sisa - $total_bet;
    					    if($credit_sisa < 0){
    				            echo "
    						        <script>
    							        alert('Credit tidak cukup');
    						        </script>
    					        ";break;
    			            }
    			            if(is_null($row_cek['used_credit'])){
        				        $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			            }else{
        				        $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			            }
    			            $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$temp_bb', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
						    $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
						    mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
						    mysqli_query($conn, $sql) OR DIE (mysqli_error());
				        }
					}
				  }
				}else if(strpos($bet_array, 'SET') !== false){
				  $n = strlen(substr($bet_array, 3));
				  if($n<3||$n>4){
					echo "
					  <script>
						alert('Bet SET hanya memasukkan 3-4 angka');
					  </script>
					";break;
				  }
				  if(strpos($jumlah_bet, '/') !== false){
					if($n==4){
					  $set_temp_4d = substr($bet_array, 3);
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
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_set_temp[0] > $row_cek['max_bet_2d']){
						  echo "
							<script>
							  alert('Jumlah bet 2D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
                      $diskon_bet = $row_cek['diskon_2d'];
				      $posisi = "2D";
			          $potongan_bet = $jumlah_set_temp[0] * $diskon_bet/100;
				      $total_bet = $jumlah_set_temp[0] + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_2d', '$jumlah_set_temp[0]', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  
					  for($k=0;$k<count($bet_3d);$k++){
						if($set_temp_3d==$bet_3d[$k]){
						  $jumlah_3d[$k] += $jumlah_set_temp[1];
						  if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
							echo "
							  <script>
								alert('Jumlah bet 3D melebihi maksimal');
							  </script>
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_set_temp[1] > $row_cek['max_bet_3d']){
						  echo "
							<script>
							  alert('Jumlah bet 3D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
					  $diskon_bet = $row_cek['diskon_3d'];
				      $posisi = "3D";
			          $potongan_bet = $jumlah_set_temp[1] * $diskon_bet/100;
				      $total_bet = $jumlah_set_temp[1] + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_3d', '$jumlah_set_temp[1]', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  for($k=0;$k<count($bet_4d);$k++){
						if($set_temp_4d==$bet_4d[$k]){
						  $jumlah_4d[$k] += $jumlah_set_temp[2];
						  if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
							echo "
							  <script>
								alert('Jumlah bet 4D melebihi maksimal');
							  </script>
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_set_temp[2] > $row_cek['max_bet_4d']){
						  echo "
							<script>
							  alert('Jumlah bet 4D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
					  $diskon_bet = $row_cek['diskon_4d'];
				      $posisi = "4D";
			          $potongan_bet = $jumlah_set_temp[2] * $diskon_bet/100;
				      $total_bet = $jumlah_set_temp[2] + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_4d', '$jumlah_set_temp[2]', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  if($credit_sisa < 0){
    				      echo "
    				        <script>
    					        alert('Credit tidak cukup');
    				        </script>
    				    ";break;
    			      }
    			      if(is_null($row_cek['used_credit'])){
        			    $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			      }else{
        			    $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			      }
					  $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
					  mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
					}else{
					  echo "
						<script>
						  alert('Bet SET Kombinasi hanya memasukkan 4 angka');
						</script>
					  ";break;
					}
				  }else{
					if($n==4){
					  $set_temp_4d = substr($bet_array, 3);
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
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_bet > $row_cek['max_bet_2d']){
						  echo "
							<script>
							  alert('Jumlah bet 2D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
                      $diskon_bet = $row_cek['diskon_2d'];
				      $posisi = "2D";
			          $potongan_bet = $jumlah_bet * $diskon_bet/100;
				      $total_bet = $jumlah_bet + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_2d', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  for($k=0;$k<count($bet_3d);$k++){
						if($set_temp_3d==$bet_3d[$k]){
						  $jumlah_3d[$k] += $jumlah_bet;
						  if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
							echo "
							  <script>
								alert('Jumlah bet 3D melebihi maksimal');
							  </script>
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_bet > $row_cek['max_bet_3d']){
						  echo "
							<script>
							  alert('Jumlah bet 3D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
					  $diskon_bet = $row_cek['diskon_3d'];
				      $posisi = "3D";
			          $potongan_bet = $jumlah_bet * $diskon_bet/100;
				      $total_bet = $jumlah_bet + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_3d', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  for($k=0;$k<count($bet_4d);$k++){
						if($set_temp_4d==$bet_4d[$k]){
						  $jumlah_4d[$k] += $jumlah_bet;
						  if($jumlah_4d[$k] > $row_cek['max_bet_4d']){
							echo "
							  <script>
								alert('Jumlah bet 4D melebihi maksimal');
							  </script>
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_bet > $row_cek['max_bet_4d']){
						  echo "
							<script>
							  alert('Jumlah bet 4D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
					  $diskon_bet = $row_cek['diskon_4d'];
				      $posisi = "4D";
			          $potongan_bet = $jumlah_bet * $diskon_bet/100;
				      $total_bet = $jumlah_bet + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_4d', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  if($credit_sisa < 0){
    				      echo "
    				        <script>
    					        alert('Credit tidak cukup');
    				        </script>
    				    ";break;
    			      }
    			      if(is_null($row_cek['used_credit'])){
        			    $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			      }else{
        			    $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			      }
					  $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
					  mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
					}else{
					  $set_temp_3d = substr($bet_array, 3);
					  $set_temp_2d = substr($set_temp_3d, 1);
					  for($k=0;$k<count($bet_2d);$k++){
						if($set_temp_2d==$bet_2d[$k]){
						  $jumlah_2d[$k] += $jumlah_bet;
						  if($jumlah_2d[$k] > $row_cek['max_bet_2d']){
							echo "
							  <script>
								alert('Jumlah bet 2D melebihi maksimal');
							  </script>
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_bet > $row_cek['max_bet_2d']){
						  echo "
							<script>
							  alert('Jumlah bet 2D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
					  $diskon_bet = $row_cek['diskon_2d'];
				      $posisi = "2D";
			          $potongan_bet = $jumlah_bet * $diskon_bet/100;
				      $total_bet = $jumlah_bet + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_2d', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  for($k=0;$k<count($bet_3d);$k++){
						if($set_temp_3d==$bet_3d[$k]){
						  $jumlah_3d[$k] += $jumlah_bet;
						  if($jumlah_3d[$k] > $row_cek['max_bet_3d']){
							echo "
							  <script>
								alert('Jumlah bet 3D melebihi maksimal');
							  </script>
							";break;
						  }
						  $cek_bet = 1;
						}
					  }
					  if($cek_bet==0){
						if($jumlah_bet > $row_cek['max_bet_3d']){
						  echo "
							<script>
							  alert('Jumlah bet 3D melebihi maksimal');
							</script>
						  ";break;
						}
					  }
					  $diskon_bet = $row_cek['diskon_3d'];
				      $posisi = "3D";
			          $potongan_bet = $jumlah_bet * $diskon_bet/100;
				      $total_bet = $jumlah_bet + $potongan_bet;
				      $credit_sisa = $credit_sisa - $total_bet;
    			      $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$set_temp_3d', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
					  mysqli_query($conn, $sql) OR DIE (mysqli_error());
					  if($credit_sisa < 0){
    				      echo "
    				        <script>
    					        alert('Credit tidak cukup');
    				        </script>
    				    ";break;
    			      }
    			      if(is_null($row_cek['used_credit'])){
        			    $total_used_credit = $row_cek['credit'] - $credit_sisa;
    			      }else{
        			    $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
    			      }
					  $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
					  mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
					}
				  }
				}
			  }else{
				if(strpos($bet_array, 'CB') !== false){
				  if(strlen(substr($bet_array, 2))!=1){
					echo "
					  <script>
						alert('Bet CB hanya memasukkan 1 angka');
					  </script>
					";break;
				  }
				  for($k=0;$k<count($bet_cb);$k++){
					if($bet_array==$bet_cb[$k]){
					  $jumlah_cb[$k] += $jumlah_bet;
					  if($jumlah_cb[$k] > $row_cek['max_bet_other']){
						echo "
								<script>
									alert('Jumlah bet CB melebihi maksimal');
								</script>
							";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet CB melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_cb'];
				  $posisi = "CB";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if(strpos($bet_array, 'MK') !== false){
				  if(strlen(substr($bet_array, 2))!=2){
					echo "
					  <script>
						alert('Bet MK hanya memasukkan 2 angka');
					  </script>
					";break;
				  }
				  for($k=0;$k<count($bet_mk);$k++){
					if($bet_array==$bet_mk[$k]){
					  $jumlah_mk[$k] += $jumlah_bet;
					  if($jumlah_mk[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet MK melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet MK melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_mk'];
				  $posisi = "MK";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if(strpos($bet_array, 'RIBUAN') !== false){
				  if(strlen(substr($bet_array, 6))!=1){
					echo "
					  <script>
						alert('Bet RIBUAN hanya memasukkan 1 angka');
					  </script>
					";break;
				  }
				  for($k=0;$k<count($bet_ribuan);$k++){
					if($bet_array==$bet_ribuan[$k]){
					  $jumlah_ribuan[$k] += $jumlah_bet;
					  if($jumlah_ribuan[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet RIBUAN melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet RIBUAN melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_cj'];
				  $posisi = "CJ";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if(strpos($bet_array, 'RATUSAN') !== false){
				  if(strlen(substr($bet_array, 7))!=1){
					echo "
					  <script>
						alert('Bet RATUSAN hanya memasukkan 1 angka');
					  </script>
					";break;
				  }
				  for($k=0;$k<count($bet_ratusan);$k++){
					if($bet_array==$bet_ratusan[$k]){
					  $jumlah_ratusan[$k] += $jumlah_bet;
					  if($jumlah_ratusan[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet RATUSAN melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet RATUSAN melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_cj'];
				  $posisi = "CJ";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if(strpos($bet_array, 'PULUHAN') !== false){
				  if(strlen(substr($bet_array, 7))!=1){
					echo "
					  <script>
						alert('Bet PULUHAN hanya memasukkan 1 angka');
					  </script>
					";break;
				  }
				  for($k=0;$k<count($bet_puluhan);$k++){
					if($bet_array==$bet_puluhan[$k]){
					  $jumlah_puluhan[$k] += $jumlah_bet;
					  if($jumlah_puluhan[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet PULUHAN melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet PULUHAN melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_cj'];
				  $posisi = "CJ";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if(strpos($bet_array, 'SATUAN') !== false){
				  if(strlen(substr($bet_array, 6))!=1){
					echo "
					  <script>
						alert('Bet SATUAN hanya memasukkan 1 angka');
					  </script>
					";break;
				  }
				  for($k=0;$k<count($bet_satuan);$k++){
					if($bet_array==$bet_satuan[$k]){
					  $jumlah_satuan[$k] += $jumlah_bet;
					  if($jumlah_satuan[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet SATUAN melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet SATUAN melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_cj'];
				  $posisi = "CJ";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'ANJING'){
				  for($k=0;$k<count($bet_anjing);$k++){
					if($bet_array==$bet_anjing[$k]){
					  $jumlah_anjing[$k] += $jumlah_bet;
					  if($jumlah_anjing[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet ANJING melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet ANJING melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'AYAM'){
				  for($k=0;$k<count($bet_ayam);$k++){
					if($bet_array==$bet_ayam[$k]){
					  $jumlah_ayam[$k] += $jumlah_bet;
					  if($jumlah_ayam[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet AYAM melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet AYAM melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'MONYET'){
				  for($k=0;$k<count($bet_monyet);$k++){
					if($bet_array==$bet_monyet[$k]){
					  $jumlah_monyet[$k] += $jumlah_bet;
					  if($jumlah_monyet[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet MONYET melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet MONYET melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KAMBING'){
				  for($k=0;$k<count($bet_kambing);$k++){
					if($bet_array==$bet_kambing[$k]){
					  $jumlah_kambing[$k] += $jumlah_bet;
					  if($jumlah_kambing[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KAMBING melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KAMBING melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KUDA'){
				  for($k=0;$k<count($bet_kuda);$k++){
					if($bet_array==$bet_kuda[$k]){
					  $jumlah_kuda[$k] += $jumlah_bet;
					  if($jumlah_kuda[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KUDA melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KUDA melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'ULAR'){
				  for($k=0;$k<count($bet_ular);$k++){
					if($bet_array==$bet_ular[$k]){
					  $jumlah_ular[$k] += $jumlah_bet;
					  if($jumlah_ular[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet ULAR melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet ULAR melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'NAGA'){
				  for($k=0;$k<count($bet_naga);$k++){
					if($bet_array==$bet_naga[$k]){
					  $jumlah_naga[$k] += $jumlah_bet;
					  if($jumlah_naga[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet NAGA melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet NAGA melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KELINCI'){
				  for($k=0;$k<count($bet_kelinci);$k++){
					if($bet_array==$bet_kelinci[$k]){
					  $jumlah_kelinci[$k] += $jumlah_bet;
					  if($jumlah_kelinci[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KELINCI melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KELINCI melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'HARIMAU'){
				  for($k=0;$k<count($bet_harimau);$k++){
					if($bet_array==$bet_harimau[$k]){
					  $jumlah_harimau[$k] += $jumlah_bet;
					  if($jumlah_harimau[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet HARIMAU melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet HARIMAU melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KERBAU'){
				  for($k=0;$k<count($bet_kerbau);$k++){
					if($bet_array==$bet_kerbau[$k]){
					  $jumlah_kerbau[$k] += $jumlah_bet;
					  if($jumlah_kerbau[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KERBAU melebihi maksimal');
						  </script>
						";
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KERBAU melebihi maksimal');
						</script>
					  ";
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'TIKUS'){
				  for($k=0;$k<count($bet_tikus);$k++){
					if($bet_array==$bet_tikus[$k]){
					  $jumlah_tikus[$k] += $jumlah_bet;
					  if($jumlah_tikus[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet TIKUS melebihi maksimal');
						  </script>
						";
					  }
					  $cek_bet = 1;
					}
				  }if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet TIKUS melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'BABI'){
				  for($k=0;$k<count($bet_babi);$k++){
					if($bet_array==$bet_babi[$k]){
					  $jumlah_babi[$k] += $jumlah_bet;
					  if($jumlah_babi[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet BABI melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet BABI melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_shio'];
				  $posisi = "SHIO";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'BESAR'){
				  for($k=0;$k<count($bet_besar);$k++){
					if($bet_array==$bet_besar[$k]){
					  $jumlah_besar[$k] += $jumlah_bet;
					  if($jumlah_besar[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet BESAR melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet BESAR melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['pajak_bkgg'];
				  $posisi = "BKGG";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KECIL'){
				  for($k=0;$k<count($bet_kecil);$k++){
					if($bet_array==$bet_kecil[$k]){
					  $jumlah_kecil[$k] += $jumlah_bet;
					  if($jumlah_kecil[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KECIL melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KECIL melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['pajak_bkgg'];
				  $posisi = "BKGG";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'GENAP'){
				  for($k=0;$k<count($bet_genap);$k++){
					if($bet_array==$bet_genap[$k]){
					  $jumlah_genap[$k] += $jumlah_bet;
					  if($jumlah_genap[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet GENAP melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet GENAP melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['pajak_bkgg'];
				  $posisi = "BKGG";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'GANJIL'){
				  for($k=0;$k<count($bet_ganjil);$k++){
					if($bet_array==$bet_ganjil[$k]){
					  $jumlah_ganjil[$k] += $jumlah_bet;
					  if($jumlah_ganjil[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet GANJIL melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet GANJIL melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['pajak_bkgg'];
				  $posisi = "BKGG";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet + $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'BESARGANJIL'){
				  for($k=0;$k<count($bet_besarganjil);$k++){
					if($bet_array==$bet_besarganjil[$k]){
					  $jumlah_besarganjil[$k] += $jumlah_bet;
					  if($jumlah_besarganjil[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet BESARGANJIL melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet BESARGANJIL melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_mkts'];
				  $posisi = "MKTS";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'BESARGENAP'){
				  for($k=0;$k<count($bet_besargenap);$k++){
					if($bet_array==$bet_besargenap[$k]){
					  $jumlah_besargenap[$k] += $jumlah_bet;
					  if($jumlah_besargenap[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet BESARGENAP melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet BESARGENAP melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_mkts'];
				  $posisi = "MKTS";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KECILGANJIL'){
				  for($k=0;$k<count($bet_kecilganjil);$k++){
					if($bet_array==$bet_kecilganjil[$k]){
					  $jumlah_kecilganjil[$k] += $jumlah_bet;
					  if($jumlah_kecilganjil[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KECILGANJIL melebihi maksimal');
						  </script>
						";break;
					  }
					}
					$cek_bet = 1;
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KECILGANJIL melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_mkts'];
				  $posisi = "MKTS";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else if($bet_array == 'KECILGENAP'){
				  for($k=0;$k<count($bet_kecilgenap);$k++){
					if($bet_array==$bet_kecilgenap[$k]){
					  $jumlah_kecilgenap[$k] += $jumlah_bet;
					  if($jumlah_kecilgenap[$k] > $row_cek['max_bet_other']){
						echo "
						  <script>
							alert('Jumlah bet KECILGENAP melebihi maksimal');
						  </script>
						";break;
					  }
					  $cek_bet = 1;
					}
				  }
				  if($cek_bet==0){
					if($jumlah_bet > $row_cek['max_bet_other']){
					  echo "
						<script>
						  alert('Jumlah bet KECILGENAP melebihi maksimal');
						</script>
					  ";break;
					}
				  }
				  $diskon_bet = $row_cek['diskon_mkts'];
				  $posisi = "MKTS";
			      $potongan_bet = $jumlah_bet * $diskon_bet/100;
				  $total_bet = $jumlah_bet - $potongan_bet;
				  $credit_sisa = $credit_sisa - $total_bet;
				}else{
			      echo "
						<script>
							alert('Format yang anda gunakan tidak sesuai');
						</script>
					";
					break;
				}
				if($credit_sisa < 0){
				    echo "
						<script>
							alert('Credit tidak cukup');
						</script>
					";break;
			    }
			    if(is_null($row_cek['used_credit'])){
				    $total_used_credit = $row_cek['credit'] - $credit_sisa;
                }else{
				    $total_used_credit = $row_cek['used_credit'] + ($row_cek['credit'] - $credit_sisa);
			    }
			    $sql = "INSERT INTO tb_bet (username_member, id_permainan, bet, jumlah_bet, diskon_bet, potongan_bet, posisi, total_bet, time_bet) VALUES ('$username', (SELECT MAX(id_permainan) FROM tb_permainan), '$bet_array', '$jumlah_bet', '$diskon_bet', '$potongan_bet', '$posisi', '$total_bet', NOW())";
			    $sql_credit = "UPDATE tb_user SET credit = $credit_sisa, used_credit = $total_used_credit WHERE username = '$username'";
			    mysqli_query($conn, $sql_credit) OR DIE (mysqli_error());
   			    mysqli_query($conn, $sql) OR DIE (mysqli_error());
			  }
			}
		/*	echo "
						<script>
							document.location.href = '?page=list_bet';
						</script>
					";*/
		}else{
			echo "
				<script>
					alert('Format yang anda gunakan tidak sesuai');
					</script>
				";break;
		}
	}
  }else{
    echo "
      <script>
        alert('Permainan telah selesai');
      </script>
    ";
  }
}

function permutations($pool, $r = null) {
    $n = count($pool);

    if ($r == null) {
        $r = $n;
    }

    if ($r > $n) {
        return;
    }

    $indices = range(0, $n - 1);
    $cycles = range($n, $n - $r + 1, -1); // count down

    yield array_slice($pool, 0, $r);

    if ($n <= 0) {
        return;
    }

    while (true) {
        $exit_early = false;
        for ($i = $r;$i--;$i >= 0) {
            $cycles[$i]-= 1;
            if ($cycles[$i] == 0) {
                // Push whatever is at index $i to the end, move everything back
                if ($i < count($indices)) {
                    $removed = array_splice($indices, $i, 1);
                    array_push($indices, $removed[0]);
                }
                $cycles[$i] = $n - $i;
            } else {
                $j = $cycles[$i];
                // Swap indices $i & -$j.
                $i_val = $indices[$i];
                $neg_j_val = $indices[count($indices) - $j];
                $indices[$i] = $neg_j_val;
                $indices[count($indices) - $j] = $i_val;
                $result = [];
                $counter = 0;
                foreach ($indices as $indx) {
                    array_push($result, $pool[$indx]);
                    $counter++;
                    if ($counter == $r) break;
                }
                yield $result;
                $exit_early = true;
                break;
            }
        }
        if (!$exit_early) {
            break; // Outer while loop
        }
    }
}

function convert_multi_array($arrays)
{
    $imploded = array();
    foreach($arrays as $array) {
        $imploded[] = implode('', $array);
    }
    return $imploded;
}

?>
<script>
function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
</script>