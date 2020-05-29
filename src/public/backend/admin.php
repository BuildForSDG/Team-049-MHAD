<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BuildForSDG - Mental Health Assisted Diagnosis">
    <title>.:: MHAD - Mental Health Assisted Diagnosis ::.</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="vendor/datatables/datatables.bootstrap4.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="css/admin.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="css/admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index.html">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">My profile</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseProfile">
                        <li>
                            <a href="user-profile.html">View profile</a>
                        </li>
                        <li>
                            <a href="doctor-profile.html">Change Password</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePatient" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Patient Management</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapsePatient">
                        <li>
                            <a href="user-profile.html">Patient Records</a>
                        </li>
                        <li>
                            <a href="user-profile.html">View PHQ-9 Result</a>
                        </li>
                        <li>
                            <a href="doctor-profile.html">Patient Quick Search</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTreatment" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Patient Treatment</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseTreatment">
                        <li>
                            <a href="#">Add New Treatment</a>
                        </li>
                        <li>
                            <a href="#">Treatment Record</a>
                        </li>
                        <li>
                            <a href="#">Quick Search</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSchedule" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Followup Schedule</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseSchedule">
                        <li>
                            <a href="#">Add New Schedule</a>
                        </li>
                        <li>
                            <a href="#">Schedule Record</a>
                        </li>
                        <li>
                            <a href="#">Quick Search</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComplaint" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Patient Compliant</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComplaint">
                        <li>
                            <a href="#">Complaint Record</a>
                        </li>
                        <li>
                            <a href="#">Quick Search</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Medical Specialist</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>26 - Total Patient Assigned</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="messages.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>11 - Total Patient Treated</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="reviews.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-calendar-check-o"></i>
                            </div>
                            <div class="mr-5">
                                <h5>10 - Total schedule</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="bookings.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>10 - Total complaint</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="bookmarks.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /cards -->
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-bar-chart"></i>Patient Monthly Statistic</h2>
                </div>
                <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
            </div>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>© <?=@date('Y');?> BuildForSDG Team-049 MHAD</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart-js/chart.js"></script>
    <script src="vendor/datatables/jquery.datatables.js"></script>
    <script src="vendor/datatables/datatables.bootstrap4.js"></script>
    <script src="vendor/jquery.selectbox-0.2.js"></script>
    <script src="vendor/retina-replace.min.js"></script>
    <script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/admin-charts.js"></script>
</body>

</html>