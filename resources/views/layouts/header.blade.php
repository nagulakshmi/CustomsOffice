<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Customs</title>
    <!-- <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{URL::asset('smart_icons/Avadi_icon.ico')}}" type="image/x-icon" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{URL::asset('/js/plugin/webfont/webfont.min.js')}}"></script>

    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['/css/fonts.min.css']
        },

        // custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['public/css/fonts.min.css']},
        active: function() {
            sessionStorage.fonts = true;

        }
    });
    </script>
   
    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap-multiselect.css') }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{URL::asset('/css/fonts.min.css') }}">
    
    <link rel="stylesheet" href="{{URL::asset('/css/atlantis.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{URL::asset('/css/demo.css')}}">



</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="smart">
				<h1 style="color:#fff;" > Customs </h1>
                <!-- <a href="#" class="logo">
                    
                    <img src="{{URL::asset('smart_icons/Avadi Corporation Logo.svg')}}" alt="homepage"
                        style="height: inherit !important; width: 60% !important" />
                </a> -->
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more">
                    <i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="orange">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <!-- <form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form> -->
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <!--<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>-->

                        <!--<li class="nav-item toggle-nav-search hidden-caret">-->
                        <li class="navbar-nav topbar-nav ml-md-auto align-items-center hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <!-- <div class="avatar-sm"> -->
                                <h4> <span class="hidden-xs" style="font-weight:600;color:#fff;">Welcome
                                        {{ strtoupper(Auth::user()->name) }}</span> </h4>
                                <!-- <img src="{{URL::asset('img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle"> -->

                                <!-- </div> -->
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <!-- <div class="avatar-lg"><img src="{{URL::asset('img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div> -->
                                            <div class="u-text">
                                                <h4> <span class="hidden-xs">
                                                        {{ strtoupper(Auth::user()->name) }}</span> </h4>
                                                <p class="text-muted">{{ strtoupper(Auth::user()->email) }}</p>

                                                <a href="/edituserdetail/{{Auth::user()->id}}"
                                                    class="btn btn-xs btn-secondary btn-sm">Change password</a></span>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- <div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a> -->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <!-- <a class="dropdown-item" href="/logout">Logout</a> -->
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <!-- <div class="sidebar sidebar-style-2" data-background-color="orange"> -->
        <div class="sidebar sidebar-style-2" style="background : #48abf730 !important;">
            <!--<div class="sidebar-wrapper scrollbar scrollbar-inner">-->
            <div class="sidebar-wrapper">
                <div class="sidebar-content">

                    <ul class="nav nav-primary">

                        <!-- <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
								<a class="nav-item" href="/chart"> Dashboard</a>

						</li> -->
                        <li class="nav-item {{{(Request::is('chart') ? 'active' : '')}}}">
                            <!-- <a data-toggle="" href="/chartnew"> -->
                            <!-- <li class="nav-item" {{{(Request::is('homecompostreport') ? 'class=active' : '')}}}>
								 <a href="{{url('/homecompostreport')}}">
									 <i class="fa fa-circle-o"></i>homecompostreport</a></li> -->
                            <a data-toggle="" href="/chart">
                                <i><img src="{{URL::asset('smart_icons/dashboard/Dashboard.svg')}}"></i>
                                <p> Dashboard</p>
                                <!-- <span class="caret"></span> -->
                            </a>

                        </li>


                        <li id="" class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section"><b style="color:#000;">Menu</b></h4>
                        </li>


                        <!-- <li class="nav-item {{{(Request::is('generalsurvey') ? 'active' : '')}}}">

                            <a data-toggle="" href="/generalsurvey">
                                <i><img src="{{URL::asset('smart_icons/dashboard/Fine Report.svg')}}"></i>
                                <p> Files</p>
                             
                            </a>

                        </li> -->



                        <li class="nav-item {{{(Request::is('create','latestfilelist','inprogessfile','closedfile','rejectfile','overall') ? 'active' : '')}}}">
                            <a data-toggle="collapse" href="#file"
                                {{{((Request::is('create','latestfilelist','inprogessfile','closedfile','rejectfile','overall')) ? 'class' : 'class=collapsed')}}}
                                {{{((Request::is('create','latestfilelist','inprogessfile','closedfile','rejectfile','overall')) ? 'aria-expanded=true' : 'aria-expanded=false')}}}>
                                <i><img src="{{URL::asset('smart_icons/dashboard/User Management.svg')}}"></i>
                                <p>Files</p>
                                <span class="caret"></span>
                            </a>
                            <div {{{((Request::is('create','filestatuslist','inprogessfile','closedfile','rejectfile','overall')) ? 'class=show' : 'class=collapse')}}}
                                id="file">
                                <ul class="nav nav-collapse">
                                    <li {{{(Request::is('create') ? 'class=active' : '')}}}>
                                        <a href="/create">
                                            <span class="sub-item">File Creation</span>
                                        </a>
                                    </li>
                                    <li {{{(Request::is('filestatuslist') ? 'class=active' : '')}}}>
                                        <a href="/filestatuslist?status_id=2">
                                            <span class="sub-item">LatestFiles List</span>
                                        </a>
                                    </li>
									<li {{{(Request::is('inprogessfile') ? 'class=active' : '')}}}>
                                        <a href="/filestatuslist?status_id=3">
                                            <span class="sub-item">InProgess Files</span>
                                        </a>
                                    </li>
									<li {{{(Request::is('closedfile') ? 'class=active' : '')}}}>
                                        <a href="/filestatuslist?status_id=4">
                                            <span class="sub-item">Closed Files</span>
                                        </a>
                                    </li>
									<li {{{(Request::is('rejectfile') ? 'class=active' : '')}}}>
                                        <a href="/filestatuslist?status_id=5">
                                            <span class="sub-item">Rejected Files</span>
                                        </a>
                                    </li>
									<li {{{(Request::is('overall') ? 'class=active' : '')}}}>
                                        <a href="/filestatuslist?status_id=0">
                                            <span class="sub-item">Overall Files</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
						<li class="nav-item {{{(Request::is('zone','addstreet') ? 'active' : '')}}}">
                            <a data-toggle="collapse" href="#report"
                                {{{((Request::is('zone','addstreet')) ? 'class' : 'class=collapsed')}}}
                                {{{((Request::is('zone','addstreet')) ? 'aria-expanded=true' : 'aria-expanded=false')}}}>
                                <i><img src="{{URL::asset('smart_icons/dashboard/User Role.svg')}}"></i>
                                <p>Reports</p>
                                <span class="caret"></span>
                            </a>
                            <div {{{((Request::is('zone','addstreet')) ? 'class=show' : 'class=collapse')}}} id="report">
                                <ul class="nav nav-collapse">
                                    <li {{{(Request::is('zone') ? 'class=active' : '')}}}>
                                        <a href="/zone">
                                            <span class="sub-item">Status Report</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item {{{(Request::is('zone','addstreet') ? 'active' : '')}}}">
                            <a data-toggle="collapse" href="#master"
                                {{{((Request::is('zone','addstreet')) ? 'class' : 'class=collapsed')}}}
                                {{{((Request::is('zone','addstreet')) ? 'aria-expanded=true' : 'aria-expanded=false')}}}>
                                <i><img src="{{URL::asset('smart_icons/dashboard/User Role.svg')}}"></i>
                                <p>Master</p>
                                <span class="caret"></span>
                            </a>
                            <div {{{((Request::is('zone','addstreet')) ? 'class=show' : 'class=collapse')}}} id="master">
                                <ul class="nav nav-collapse">
                                    <li {{{(Request::is('zone') ? 'class=active' : '')}}}>
                                        <a href="/zone">
                                            <span class="sub-item">Department</span>
                                        </a>
                                    </li>
                                    <li {{{(Request::is('addstreet') ? 'class=active' : '')}}}>
                                        <a href="/addstreet">
                                            <span class="sub-item">Role</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
						<li class="nav-item {{{(Request::is('zone','addstreet') ? 'active' : '')}}}">
                            <a data-toggle="collapse" href="#user"
                                {{{((Request::is('zone','addstreet')) ? 'class' : 'class=collapsed')}}}
                                {{{((Request::is('zone','addstreet')) ? 'aria-expanded=true' : 'aria-expanded=false')}}}>
                                <i><img src="{{URL::asset('smart_icons/dashboard/User Role.svg')}}"></i>
                                <p>User Management</p>
                                <span class="caret"></span>
                            </a>
                            <div {{{((Request::is('zone','addstreet')) ? 'class=show' : 'class=collapse')}}} id="user">
                                <ul class="nav nav-collapse">
                                    <li {{{(Request::is('zone') ? 'class=active' : '')}}}>
                                        <a href="/zone">
                                            <span class="sub-item">Create New User</span>
                                        </a>
                                    </li>
                                    <!-- <li {{{(Request::is('addstreet') ? 'class=active' : '')}}}>
                                        <a href="/addstreet">
                                            <span class="sub-item">Role</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </li>
					
						
                        <li id="" class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section"><b style="color:#000;">Audit Log</b></h4>
                        </li>



                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">

            <div class="content">
                <!--	<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>

							</div>

						</div>
					</div>
				</div>-->

                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">

                    <div class="copyright ml-auto">
                        <!-- <img src="{{URL::asset('qrimgs/footer.jpg')}}"> -->
                        2019, made by eQuadriga
                    </div>
                </div>


            </footer>
        </div>


    </div>
    <!--   Core JS Files   -->
    <!--<script src="{{URL::asset('/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{URL::asset('/js/core/popper.min.js')}}"></script>
	<script src="{{URL::asset('/js/core/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('/js/core/jquery.3.2.1.min.js')}}"></script>-->
    <script src="{{URL::asset('/js/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/core/popper.min.js')}}"></script>
    <script src="{{URL::asset('/js/core/bootstrap.min.js')}}"></script>

    <!--tccqr--js-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{URL::asset('/js/js/bootstrap.min.js')}}"></script>
    <!--tccqr--js-->

    <!-- jQuery UI -->
    <script src="{{URL::asset('/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{URL::asset('/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{URL::asset('/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Chart JS -->
    <!-- <script src="{{URL::asset('/js/plugin/chart.js/chart.js')}}"></script> -->
    <script src="{{ URL::asset('/js/canvasjs.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{URL::asset('/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{URL::asset('/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{URL::asset('/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <!-- <script src="{{URL::asset('/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script> -->

    <!-- jQuery Vector Maps -->
    <!-- <script src="{{URL::asset('/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{URL::asset('/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script> -->

    <!-- Sweet Alert -->
    <script src="{{URL::asset('/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    <!-- <script src="multiselect/jquery.multiselect.js"></script> -->

    <script src="{{URL::asset('/js/js/bootstrap-multiselect.js')}}"></script>
    <!--<script src="{{URL::asset('/js/js/require.js')}}"></script>
	   <script src="{{URL::asset('/js/js/require.min.js')}}"></script>-->




    <!-- Atlantis JS -->
    <script src="{{URL::asset('/js/custom.js')}}"></script>
    <script src="{{URL::asset('/js/atlantis.min.js')}}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{URL::asset('/js/setting-demo.js')}}"></script>
    <script src="{{URL::asset('/js/demo.js')}}"></script>
    <script src="{{URL::asset('/js/FileSaver.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.0/jszip.js"></script>
    <script type="text/javascript" src="//stuk.github.io/jszip-utils/dist/jszip-utils.js"></script>



    <link rel="stylesheet" href="{{URL::asset('/css/tccstyle.css') }}">
    <!--<link rel="stylesheet" href="{{URL::asset('/css/bootstrap-multiselect.css') }}">
<script src="{{URL::asset('/js/js/bootstrap-multiselect.js')}}"></script>-->

    @yield('footer')
</body>

<script>
document.ready(function() {
    

})
</scipt>

</html>