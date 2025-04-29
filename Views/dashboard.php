<?php if ($_SESSION['user']['role'] === 'citoyen'): ?>
<style>
.welcome-section {
    background: linear-gradient(135deg, rgb(73, 89, 123), rgb(150, 219, 154));
    color: white;
    padding: 60px 30px;
    border-radius: 15px;
    animation: slideFade 1s ease-out forwards;
    opacity: 0;
    transform: translateY(-20px);
    margin-top: 60px;
}

@keyframes slideFade {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.welcome-section h1 {
    font-size: 2.5rem;
    font-weight: bold;
}

.welcome-section p {
    font-size: 1.2rem;
}

.btn-welcome {
    margin-top: 20px;
    background-color: #ffffff;
    color: rgb(34, 39, 34);
    font-weight: bold;
}

.btn-welcome:hover {
    background-color: rgb(62, 91, 63);
    color: #fff;
}
</style>
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="container">
        <div class="welcome-section text-center shadow-lg">
            <h1>Bienvenue sur votre Espace Citoyen</h1>
            <p>Gérez facilement vos demandes administratives et suivez leur progression en toute simplicité.</p>
            <a href="index.php?action=new_demande" class="btn btn-welcome">Faire une nouvelle demande</a>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-4 col-sm-9  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                <div class="count">2500</div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-4 col-sm-9  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Demades en attente</span>
                <div class="count">123.50</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last
                    Week</span>
            </div>
            <div class="col-md-4 col-sm-9  tile_stats_count">
                <span class="count_top"><i class="glyphicon glyphicon-ok"></i> Demades traite</span>
                <div class="count green">2,500</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                    Week</span>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Liste de vos demandes <small>basic table subtitle</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 25%;">Types de demande</th>
                                        <th style="width: 30%;">Justificatifs /Actes</th>
                                        <th style="width: 15%;">Statut</th>
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Actes de naissance</td>
                                        <td>photo</td>
                                        <td><a href="#" class="btn btn-success btn-xs"><i class="fa fa-ok"></i>
                                                Valider</a></td>
                                        <td scope="row">
                                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Actes de naissance</td>
                                        <td>photo</td>
                                        <td><a href="#" class="btn btn-success btn-xs"><i class="fa fa-ok"></i>
                                                Valider</a></td>
                                        <td scope="row">
                                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Actes de naissance</td>
                                        <td>photo</td>
                                        <td><a href="#" class="btn btn-success btn-xs"><i class="fa fa-ok"></i>
                                                Valider</a></td>
                                        <td scope="row">
                                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Actes de naissance</td>
                                        <td>photo</td>
                                        <td><a href="#" class="btn btn-success btn-xs"><i class="fa fa-ok"></i>
                                                Valider</a></td>
                                        <td scope="row">
                                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-8 col-sm-8  ">
                    <div class="x_panel fixed_height_390">
                        <div class="x_content">

                            <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                    <li>
                                        <a>
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <img src="public/assets/images/user.png" alt="..."
                                            class="img-circle profile_img">
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-round btn-primary"><i
                                                class="fa fa-plus"></i> Nouveau</button>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="name">Ma Famille</h3>

                            <div class="flex ">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">Nom</th>
                                            <th style="width: 25%;">Prénom</th>
                                            <th style="width: 30%;">Lien De parenté</th>
                                            <th style="width: 15%;">Statut</th>
                                            <th style="width: 25%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">BAGAYOKO</th>
                                            <td>Aboubacar</td>
                                            <td>Père</td>
                                            <td>ddz</td>
                                            <td scope="row">
                                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                    Edit</a>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                            <p>
                                If you've decided to go in development mode and tweak all of this a bit, there are few
                                things you should do.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br />

    <div class="row">


        <!-- <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Document les plus Demander</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Actes de naissance</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>69k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Actes de deces</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>53k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Actes de mariage</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>23k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Residence</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>3k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>Device Usage</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Top 5</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 ">
                                    <p class="">Device</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 ">
                                    <p class="">Progress</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas class="canvasDoughnut" height="140" width="140"
                                    style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Android </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Others </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Quick Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                            </li>
                            <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                            </li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                            </li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                            </li>
                            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                            </li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Profile Completion</h4>
                            <canvas width="150" height="80" id="chart_gauge_01" class=""
                                style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span id="gauge-text" class="gauge-value pull-left">0</span>
                                <span class="gauge-value pull-left">%</span>
                                <span id="goal-text" class="goal-value pull-right">100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>


    <div class="row">
        <!--   <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Recent Activities <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for
                                            movie makers. They were where you met the producers that could
                                            fund your project, and if the buyers liked your flick, they’d
                                            pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for
                                            movie makers. They were where you met the producers that could
                                            fund your project, and if the buyers liked your flick, they’d
                                            pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for
                                            movie makers. They were where you met the producers that could
                                            fund your project, and if the buyers liked your flick, they’d
                                            pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for
                                            movie makers. They were where you met the producers that could
                                            fund your project, and if the buyers liked your flick, they’d
                                            pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
</div>