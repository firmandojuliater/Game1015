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
                            <a href="#"><i class="icon-home"></i></a>
                        </li>
                        <li>
                            <a href="#">Member</a>
                        </li>
                        <li>
                            List BET
                        </li>

                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading">List BET</h3>
                    <div class="formSep">
                        <a href='#addnew' class='btn btn-success btn-large' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> BET</a>
                    </div>
                    <label>Masukkan BET</label>
                    <textarea name="input" id="input" cols="10" rows="6" onkeydown="upperCaseF(this)" class="span12"></textarea>

                    <div class="formSep">
                        <a href='#addnew1' class='btn btn-success btn-large' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Cek BET (modal)</a>
                    </div>
                </div>
            </div>
            <?php include('BET.php') ?>
            <?php include('cek_bet.php') ?>


        </div>
    </div>
</body>

</html>