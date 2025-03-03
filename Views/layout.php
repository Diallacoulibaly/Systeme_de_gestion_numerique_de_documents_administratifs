<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Gentelella Alela!</title>
    <!-- Je charge les css du template -->
    <!-- Bootstrap -->
    <link href="public/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="public/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="public/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="public/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="public/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/assets/build/css/custom.min.css" rel="stylesheet">
<<<<<<< HEAD
=======
    <!-- Pour le nouveau style -->
    <link href="public/assets/build/css/style.css" rel="stylesheet">
>>>>>>> 6e7aacee603d3fe8571515d56dfd0b703b33ab48
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="glyphicon glyphicon-leaf"></i> <span>IDocsMali
                            </span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- je charge le menu profile  -->
                    <?php include('views/composant/profileMenu.php'); ?>
                    <!-- /menu profile  -->

                    <br />

                    <!-- je charge le sidebar menu -->
                    <?php include('views/composant/sidebar.php'); ?>
                    <!-- /sidebar menu -->

                    <!-- je charge le menu footer buttons -->
                    <?php include('views/composant/menuFooter.php'); ?>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- je charge la bar de navigation du haut-->
            <?php include('views/composant/topNav.php'); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <?php
            // Afficher dynamiquement la vue demandée
            if (isset($page)) {
                include("Views/$page.php");
            } else {
                echo "<p>Page introuvable.</p>";
            }
            ?>
            <!-- /page content -->

            <!-- footer content -->
            <?php include('views/composant/footer.php'); ?>
            <!-- /footer content -->
        </div>
    </div>


    <!-- Je charge les fichier du template -->
    <!-- jQuery -->
    <script src="public/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="public/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="public/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="public/assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="public/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="public/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="public/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="public/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="public/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="public/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="public/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="public/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="public/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="public/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="public/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="public/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="public/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="public/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="public/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="public/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="public/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="public/assets/vendors/moment/min/moment.min.js"></script>
    <script src="public/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="public/assets/build/js/custom.min.js"></script>

</body>

</html>