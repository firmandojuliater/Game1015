<div class="modal hide fade" id="addnew1">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3>Bet</h3>
    </div>
    <div class="modal-body">
        <div class="container-fluid">
            <form method="POST" action="#">
                <div class="row-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Type</th>
                                <th>Disc</th>
                                <th>KK</th>
                                <th>Win</th>
                                <th>Net</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['time'])) {
                                $query = "SELECT bet, sum(jumlah_bet) AS jumlah_bet FROM tb_bet WHERE id_permainan = (SELECT MAX(id_permainan) FROM tb_permainan) AND username_member='$_SESSION[username]' AND DATE(time_bet) ='$_GET[time]' GROUP BY bet";
                            } else {
                                $query = "SELECT bet, sum(jumlah_bet) AS jumlah_bet FROM tb_bet WHERE id_permainan = (SELECT MAX(id_permainan) FROM tb_permainan) AND username_member='$_SESSION[username]' GROUP BY bet";
                            }
                            $sql = mysqli_query($conn, $query);
                            $a = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td>" . $a . "</td>";
                                echo "<td>" . $row['bet'] . "</td>";
                                echo "<td>" . $row['jumlah_bet'] . "</td>";
                                echo "</tr>";
                                $a++;
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" value="Save" class="btn btn-success">Submit</a></button>
    </div>
    </form>
</div>