<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BuildForSDG - Medical Health Assisted Diagnosis">
    <title>.:: MHAD - Medical Health Assisted Diagnosos ::.</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="frontend/img/favicon.ico" type="image/x-icon">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="frontend/css/menu.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
	<link href="frontend/css/vendors.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="frontend/css/custom.css" rel="stylesheet">
	<!-- MODERNIZR MENU -->
	<script src="frontend/js/modernizr.js"></script>
</head>
<body>	
    @include('inc.header')
	<!-- /Header -->
	<div class="container">
        @include('inc.messages')
        @yield('content')
    </div>
    <!-- /container -->
    <div class="container">
        <footer id="home" class="clearfix">
            <p>© <?=@date('Y');?> BuildForSDG Team-049 MHAD</p>
            <ul>
                <li><a href="#" class="animated_link">Admin Login</a></li>
                <li><a href="#" class="animated_link">Doctor Login</a></li>
            </ul>
        </footer>
        <!-- end footer-->
    </div>
    <!-- /container -->
    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->
    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->
	
	<!-- Modal info -->
	<div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="more-infoLabel">Medical Health Assited Diagnosis</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <p><h5>Facts & Figures</h5></p> 
                    <p>PHQ-9 is a validated, 9-question tool to assess for the degree of depression present in an individual; the last question is not scored, but is useful functionally to help the clinician assess the impact of the patient's symptoms on his or her life. <br>- <small><i>MDCALC</i></small></p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- COMMON SCRIPTS -->
	<script src="frontend/js/jquery-3.2.1.min.js"></script>
    <script src="frontend/js/common_scripts.min.js"></script>
	<script src="frontend/js/velocity.min.js"></script>
	<script src="frontend/js/common_functions.js"></script>
	<!-- Wizard script-->
	<script src="frontend/js/func_1.js"></script>
    </body>
</html>