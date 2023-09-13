<?php

// include 'include/database_connect.php';
// include 'include/security_token.php';

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Portfollio|Admin|Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <!-- C3 Chart css -->
    <link href="assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">

</head>

<body data-sidebar="dark">


    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img class="img-fluid" src="assets/images/it-fast.png" alt="" height="22" width="auto">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/it-fast.png" alt="" height="36">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block ms-2">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input form-control" placeholder="Search">
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex">





                    <div class="dropdown d-none d-md-block me-2">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="font-size-16">
                                <?php

                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                }


                                ?>
                            </span>
                        </button>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item text-danger" href="logout.php">Logout</a>


                        </div>
                    </div>

                    <div class="dropdown d-inline-block me-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ion ion-md-notifications"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notification (3) </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="mdi mdi-cart-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                <i class="mdi mdi-message-text-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-info rounded-circle font-size-16">
                                                <i class="mdi mdi-glass-cocktail"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It is a long established fact that a reader will</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14  text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <?php include 'Menu/menu.php'; ?>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    
                    <div class="row" id="fileterResponse">

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <a href="template.php">
                                    <div class="card-body">
                                        <div class="mini-stat">
                                            <span class="mini-stat-icon bg-purple me-0 float-end"><i class=" fas fa-users"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-teal" id="activeStd">
                                                    <?php

                                                    // if ($activeStd = $con->query("SELECT * FROM customers  ")) {
                                                    //     echo  $activeStd->num_rows;
                                                    // }
                                                        echo 0;

                                                    ?>
                                                </span>
                                                Total Template
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--End col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <a href="expired_customer.php">
                                    <div class="card-body">
                                        <div class="mini-stat">
                                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="fas fa-user"></i></span>
                                            <div class="mini-stat-info text-danger">
                                                <span class="counter " id="totalBatch">
                                                <?php 
                                                // if ($expire=$con->query("SELECT * FROM `customers` WHERE `expire_date`<NOW()")) {
                                                //    echo  $expire->num_rows;
                                                // }
                                                
                                                ?>00
                                                </span>
                                                Total Service
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- End col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mini-stat">
                                        <span class="mini-stat-icon bg-teal me-0 float-end"><i class=" fas fa-dollar-sign"></i></span>
                                        <div class="mini-stat-info">
                                            <span class="counter text-teal" id="totalDue">
                                                <?php 
                                                
                                                // if($allAmount=$con->query("SELECT SUM(due) as totalDue FROM customers "))
                                                // {
                                                //     while($rows=$allAmount->fetch_array()){
                                                //         echo  $totalDue= number_format($rows['totalDue']); 
                                                //     }
                                                // }
                                                
                                                ?>00
                                            </span>
                                            Total Blog
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col -->
                    </div> <!-- end row-->


                    

                      
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php require 'Footer/footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>


    <!-- Peity chart-->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>

    <!--C3 Chart-->
    <script src="assets/libs/d3/d3.min.js"></script>
    <script src="assets/libs/c3/c3.min.js"></script>

    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
       
    </script>

</body>

</html>