<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BuildForSDG - Mental Health Assisted Diagnosis">
    <title>.:: MHAD - Admin Backend ::.</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="backend/img/favicon.ico" type="image/x-icon">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="backend/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="backend/vendor/datatables/datatables.bootstrap4.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="backend/css/admin.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="backend/css/admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    @include('backend.inc.navbar')
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
                @include('inc.messages')
                @yield('content')
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
                <div class="modal-body">Click on "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="backend/vendor/jquery/jquery.min.js"></script>
    <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="backend/vendor/chart-js/chart.js"></script>
    <script src="backend/vendor/datatables/jquery.datatables.js"></script>
    <script src="backend/vendor/datatables/datatables.bootstrap4.js"></script>
    <script src="backend/vendor/jquery.selectbox-0.2.js"></script>
    <script src="backend/vendor/retina-replace.min.js"></script>
    <script src="backend/vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="backend/js/admin.js"></script>
    <!-- Custom scripts for this page-->
    <script src="backend/js/admin-charts.js"></script>
</body>

</html>