<?php include 'cek_session.php';
include '../koneksi.php'; ?>
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
                            <a href="#">Member</a>
                        </li>
                        <li>
                            Riwayat Result
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading">Riwayat BET</h3>
                    <table class="table table-striped table-bordered dTableR" id="dt_a">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Result</th>
                                <th>Waktu Permainan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM tb_permainan ORDER BY waktu_permainan DESC";
                            $sql = mysqli_query($conn, $query);
                            $a = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td>" . $a . "</td>";
                                echo "<td>" . $row['result'] . "</td>";
                                echo "<td>" . $row['waktu_permainan'] . "</td>";
                                echo "</tr>";
                                $a++;
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