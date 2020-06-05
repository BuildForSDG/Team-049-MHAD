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
                                <a href="{{route('specialistProfile')}}">View profile</a>
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
                                <a href="{{route('record')}}">Patient Records</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/phq9">View PHQ-9 Result</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/psearch">Patient Quick Search</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Treatment">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTreatment" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-heart"></i>
                            <span class="nav-link-text">Patient Treatment</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseTreatment">
                            <li>
                                <a href="{{route('addtreatment')}}">Add New Treatment</a>
                            </li>
                            <li>
                                <a href="{{route('treatments')}}">Treatment Record</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/Tsearch">Quick Search</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Followup Schedule">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSchedule" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-heart"></i>
                            <span class="nav-link-text">Followup Schedule</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseSchedule">
                            <li>
                                <a href="{{route('newschedule')}}">Add New Schedule</a>
                            </li>
                            <li>
                                <a href="{{route('schedules')}}">Schedule Record</a>
                            </li>
                            <li>
                                <a href="#">Quick Search</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Compliant">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComplaint" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-heart"></i>
                            <span class="nav-link-text">Patient Compliant</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComplaint">
                            <li>
                                <a href="{{route('complains')}}">Complaint Record</a>
                            </li>
                            <li>
                                <a href="{{config('app.url')}}/complaintsearch">Quick Search</a>
                            </li>
                        </ul>
                    </li>
                        @break
                    @case('Patient')
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-heart"></i>
                                <span class="nav-link-text">My profile</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapseProfile">
                                <li>
                                    <a href="{{config('app.url')}}/myprofile">View profile</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/preset">Change Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="PHQ-9 Test">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePatient" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-heart"></i>
                                <span class="nav-link-text">PHQ-9 Test</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapsePatient">
                                <li>
                                    <a href="{{config('app.url')}}/new_phq9">New Test</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/phq9_result">View PHQ-9 Result</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Treatement">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTreatment" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-heart"></i>
                                <span class="nav-link-text">My Treatment</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapseTreatment">
                                <li>
                                    <a href="{{config('app.url')}}/mytreatment">Treatment Record</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/myTsearch">Quick Search</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Followup">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSchedule" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-heart"></i>
                                <span class="nav-link-text">Followup Schedule</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapseSchedule">
                                <li>
                                    <a href="{{config('app.url')}}/myschedule">Schedule Record</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/myschedule_search">Quick Search</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Compliant">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComplaint" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-heart"></i>
                                <span class="nav-link-text">My Compliant</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapseComplaint">
                                <li>
                                    <a href="{{config('app.url')}}/addcomplaint">New Complaint</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/complaintrecord">Complaint Record</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/complaintsearch">Quick Search</a>
                                </li>
                            </ul>
                        </li>
                        @break
                        @case('Admin')
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-user"></i>
                                <span class="nav-link-text">My profile</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapseProfile">
                                <li>
                                    <a href="{{config('app.url')}}/adminprofile">View profile</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/adminreset">Change Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="PHQ-9 Result">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePatient" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-pencil"></i>
                                <span class="nav-link-text">PHQ-9 Result</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="collapsePatient">
                                <li>
                                    <a href="{{config('app.url')}}/phq9view">View Record</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/phq9search">Quick Search</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Specialist Record">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#specialistrecord" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-user"></i>
                                <span class="nav-link-text">Specialist Record</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="specialistrecord">
                                <li>
                                    <a href="{{config('app.url')}}/specialistrecord">View Record</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/specialistsearch">Quick Search</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient Record">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#patientrecord" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-user"></i>
                                <span class="nav-link-text">Patient Record</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="patientrecord">
                                <li>
                                    <a href="{{config('app.url')}}/patientrecord">View Record</a>
                                </li>
                                <li>
                                    <a href="{{config('app.url')}}/patientsearch">Quick Search</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pateint Complaint">
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComplaint" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-user"></i>
                                <span class="nav-link-text">Pateint Complaint</span>
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
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Management">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#usermanagement" data-parent="#exampleAccordion">
                                    <i class="fa fa-fw fa-user"></i>
                                    <span class="nav-link-text">User Management</span>
                                </a>
                                <ul class="sidenav-second-level collapse" id="usermanagement">
                                    <li>
                                        <a href="{{config('app.url')}}/adduser">Add New User</a>
                                    </li>
                                    <li>
                                            <a href="{{config('app.url')}}/userrecord">User Record</a>
                                        </li>
                                    <li>
                                        <a href="{{config('app.url')}}/usersearch">Quick Search</a>
                                    </li>
                                </ul>
                            </li>
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
                @switch(session('userType')[0])
                    @case('Specialist')
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
                @break
                @case('Patient')
                        
                @break;
                    @default
                        
                @endswitch
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