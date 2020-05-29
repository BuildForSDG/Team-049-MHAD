<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="{{config('app.url')}}/Admin">
            <img src="backend/img/logo.png" data-retina="true" alt="" width="163" height="36">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{config('app.url')}}/Admin">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                @switch(session('userType')[0])
                    @case('Specialist')
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-heart"></i>
                            <span class="nav-link-text">My profile</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseProfile">
                            <li>
                                <a href="{{config('app.url')}}/profile">View profile</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/reset">Change Password</a>
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
                                <a href="{{config('app.url')}}/patient">Patient Records</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/phq9">View PHQ-9 Result</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/psearch">Patient Quick Search</a>
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
                                <a href="{{config('app.url')}}/Tcreate">Add New Treatment</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/treatment">Treatment Record</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/Tsearch">Quick Search</a>
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
                                <a href="{{config('app.url')}}/newschedule">Add New Schedule</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/schedule">Schedule Record</a>
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
                                <a href="{{config('app.url')}}/complaintrecord">Complaint Record</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/complaintsearch">Quick Search</a>
                            </li>
                        </ul>
                    </li>
                        @break
                    @case('Patient')
                        
                        @break
                        @case('Admin')
                        
                        @break
                    @default
                        
                @endswitch
                
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
                        </span>
                        <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Patient Complain:</h6>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>David Miller</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I took the drugs and I'm getting better</div>
                        </a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts
                            <span class="badge badge-pill badge-warning">1 New</span>
                        </span>
                        <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">Patient Alerts:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-success">
                                <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>New Patient Assigned</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">Godwin James - 60%.</div>
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all alerts</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-lg-2" href="{{config('app.url')}}/profile" >
                        <i class="fa fa-fw fa-user"></i>{{session('fullName')[0]}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>