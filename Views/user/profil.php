<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Profile utilisateur</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>User Report <small>Activity report</small></h2>
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
                                    <div class="col-md-3 col-sm-3  profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view"
                                                    src="public/assets/images/picture.jpg" alt="Avatar"
                                                    title="Change the avatar">
                                            </div>
                                        </div>
                                        <h3><?php echo $_SESSION['user']['nom'] . " " . $_SESSION['user']['prenom'] ?>
                                        </h3>

                                        <ul class="list-unstyled user_data">
                                            <li><i class="fa fa-map-marker user-profile-icon"></i>
                                                <?php echo $_SESSION['user']['adresse'] ?>
                                            </li>

                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i>
                                                <?php echo $_SESSION['user']['role'] ?>
                                            </li>

                                            <li class="m-top-xs">
                                                <i class="fa fa-external-link user-profile-icon"></i>
                                                <a target="_blank"><?php echo $_SESSION['user']['email'] ?></a>
                                            </li>
                                        </ul>

                                        <a href="index.php?action=editProfil " class="btn btn-success"><i
                                                class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                        <br />



                                    </div>
                                    <div class="col-md-9 col-sm-9 ">





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- /page content -->


</body>