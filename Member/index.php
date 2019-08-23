<!DOCTYPE html>
<html lang="en">

<?php include 'cek_session.php';
include '../koneksi.php'; ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GAME</title>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css" />
    <!-- gebo blue theme-->
    <link rel="stylesheet" href="../css/blue.css" id="link_theme" />
    <!-- breadcrumbs-->
    <link rel="stylesheet" href="../lib/jBreadcrumbs/css/BreadCrumb.css" />
    <!-- tooltips-->
    <link rel="stylesheet" href="../lib/qtip2/jquery.qtip.min.css" />
    <!-- notifications -->
    <link rel="stylesheet" href="../lib/sticky/sticky.css" />
    <!-- code prettify -->
    <link rel="stylesheet" href="../lib/google-code-prettify/prettify.css" />
    <!-- notifications -->
    <link rel="stylesheet" href="../lib/sticky/sticky.css" />
    <!-- splashy icons -->
    <link rel="stylesheet" href="../img/splashy/splashy.css" />
    <!-- colorbox -->
    <link rel="stylesheet" href="../lib/colorbox/colorbox.css" />

    <!-- main styles -->
    <link rel="stylesheet" href="../css/style.css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico" />


    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/ie.css" />
        <script src="js/ie/html5.js"></script>
  <script src="js/ie/respond.min.js"></script>
    <![endif]-->

    <script>
        //* hide all elements & show preloader
        document.documentElement.className += 'js';
    </script>
</head>

<body>
    <div id="maincontainer" class="clearfix">
        <!-- header -->
        <header>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand" href="dashboard.html"></i> Game</a>
                        <ul class="nav user_menu pull-right">
                            <li class="divider-vertical hidden-phone hidden-tablet"></li>
                            <a href="logout.php" class="btn btn-gebo">Sign Out</a>
                        </ul>

                    </div>
                </div>
            </div>
        </header>

        <?php include 'isi.php'; ?>

        <!-- sidebar -->
        <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
        <div class="sidebar">

            <div class="antiScroll">
                <div class="antiscroll-inner">
                    <div class="antiscroll-content">

                        <div class="sidebar_inner">
                            <form class="input-append">

                            </form>

                            <div class="sidebar_info">
                                <ul class="unstyled">
                                    <?php
                                    $username = $_SESSION['username'];
                                    $query = "SELECT * FROM tb_user WHERE username='$username'";
                                    $sql = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($sql); ?>
                                    <li>
                                        <span class="act act-danger"><button class="btn btn-inverse btn-mini"><i class="splashy-refresh" onClick="history.go(0)"></i></button></span>
                                        <strong><?= $row['username'] ?></strong>

                                    </li>
                                    <li>
                                        <strong>Waktu</strong> <br>
                                        <span><?php echo date('l, d-m-Y'); ?></span>
                                        <span><?php echo date('h:i:s a ', strtotime('+5 hours')); ?></span>
                                    </li>
                                    <li>
                                        <span class="act act-danger">Rp. <?= $row['credit'] ?></span>
                                        <strong>Credit</strong>
                                    </li>
                                    <li>
                                        <span class="act act-danger">Rp. <?= $row['used_credit'] ?></span>
                                        <strong>Used Credit</strong>
                                    </li>
                                    <li>
                                        <span class="act act-danger">65</span>
                                        <strong>Balance</strong>
                                    </li>
                                    <li>
                                        <span class="act act-danger">10</span>
                                        <strong>Outstanding</strong>
                                    </li>
                                    <li>
                                        <span class="act act-danger">85</span>
                                        <strong>Total Credit</strong>
                                    </li>
                                    <li>
                                        <span class="act act-danger">85</span>
                                        <strong>Given Credit</strong>
                                    </li>
                                </ul>
                            </div>
                            <div id="side_accordion" class="accordion">


                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                            <i class="icon-folder-close"></i> Member
                                        </a>
                                    </div>
                                    <div class="accordion-body collapse" id="collapseOne">
                                        <div class="accordion-inner">
                                            <ul class="nav nav-list">
                                                <li><a href="?page=list_bet">Permainan</a></li>
                                                <li><a href="?page=outstanding">Outstanding</a></li>
                                                <li><a href="?page=statement">Statement</a></li>
                                                <li><a href="?page=history">History Result</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                            <i class="icon-folder-close"></i> Ganti Bahasa
                                        </a>
                                    </div>
                                    <div class="accordion-body collapse" id="collapseTwo">
                                        <div class="accordion-inner">
                                            <ul class="nav nav-list">
                                                <li><a href="#">Bahasa Indonesia</a></li>
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">Tiếng Việt</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="push"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script src="../js/jquery.min.js"></script>
        <!-- smart resize event -->
        <script src="../js/jquery.debouncedresize.min.js"></script>
        <!-- hidden elements width/height -->
        <script src="../js/jquery.actual.min.js"></script>
        <!-- js cookie plugin -->
        <script src="../js/jquery.cookie.min.js"></script>
        <!-- main bootstrap js -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- tooltips -->
        <script src="../lib/qtip2/jquery.qtip.min.js"></script>
        <!-- jBreadcrumbs -->
        <script src="../lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
        <!-- sticky messages -->
        <script src="../lib/sticky/sticky.min.js"></script>
        <!-- fix for ios orientation change -->
        <script src="../js/ios-orientationchange-fix.js"></script>
        <!-- scrollbar -->
        <script src="../lib/antiscroll/antiscroll.js"></script>
        <script src="../lib/antiscroll/jquery-mousewheel.js"></script>
        <!-- lightbox -->
        <script src="../lib/colorbox/jquery.colorbox.min.js"></script>
        <!-- common functions -->
        <script src="../js/gebo_common.js"></script>
        <!-- datatable -->
        <script src="../lib/datatables/jquery.dataTables.min.js"></script>
        <script src="../lib/datatables/extras/Scroller/media/js/Scroller.min.js"></script>
        <!-- datatable functions -->
        <script src="../js/gebo_datatables.js"></script>


        <script>
            $(document).ready(function() {
                //* show all elements & remove preloader
                setTimeout('$("html").removeClass("js")', 1000);
            });
        </script>

    </div>
</body>

</html>