<?php include '../koneksi.php';
include 'cek_session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <!-- main content -->
    <div id="contentwrapper">
        <div class="main_content">

            <nav>
                <div id="jCrumbs" class="breadCrumb module">
                    <ul>
                        <li>
                            <a href="?page=2"><i class="icon-home"></i></a>
                        </li>
                        <li>
                            <a href="#">Total Bet</a>
                        </li>
                        <li>
                            Bet Agent
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading">BET</h3>
                    <table class="table table-striped table-bordered dTableR" id="dt_a">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Max Bet 2d</th>
                                <th>Max Bet 3d</th>
                                <th>Max Bet 4d</th>
                                <th>Max Bet Other</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM tb_user WHERE hak_akses != 'Master Agent'";
                            $sql = mysqli_query($conn, $query);
                            $a = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td>" . $a . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                echo "<td>" . $row['max_bet_2d'] . "</td>";
                                echo "<td>" . $row['max_bet_3d'] . "</td>";
                                echo "<td>" . $row['max_bet_4d'] . "</td>";
                                echo "<td>" . $row['max_bet_other'] . "</td>";
                                echo "
                          <td>
                          <a href='#edit_" . $row['username'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                          <a href='hapus_bet.php?username=" . $row['username'] . "' class='btn btn-danger btn-sm' ><span class='glyphicon glyphicon-trash'></span> Delete</a>
                          </td>";
                                echo "</tr>";
                                $a++;
                                include('ubah_bet.php');
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>