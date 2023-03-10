<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Pembayaran SPP</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Poppins:wght@300&display=swap" rel="stylesheet"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- Sweet Alert -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
	
     @yield('plugin')
  
</head>



<body style="font-family: 'Poppins', sans-serif;">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div  id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md" style="background-color: #ae7d59;">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ url('/dashboard') }}" style="background-color: #ae7d59;">                                            
                        <!-- Logo text -->
                        
                            <img src="{{ asset('/assets/images/smea.png') }}" class="rounded-0 " style="width: 50px; height: 50px;"  alt="profile_picture">
            
                        <span class="logo-text text-dark font-weight-bold ml-2">                          
						 E-Pembayaran SPP                             
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5" style="background-color: #ae7d59;">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Logo Text -->
                        <!-- ============================================================== -->
                        <a class="navbar-brand" href="{{ url('/dashboard') }}">                                            
                    </a>                   
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <div class="user-profile d-flex no-block dropdown ">
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium text-dark">{{ $user->name }}<i class="ml-2 fa fa-angle-down"></i></h5>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">  						
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="mdi mdi-logout mdi-24px m-r-5 m-l-5"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard') }}" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
					@if(auth()->user()->level == 'admin')
                        <li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-siswa') }}" aria-expanded="false">
								<i class="mdi mdi-account-outline"></i>
								<span class="hide-menu">Data Siswa</span>
							</a>
						</li>
                        <li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-petugas') }}" aria-expanded="false">
								<i class="mdi mdi-account-multiple"></i>
								<span class="hide-menu">Data Petugas</span>
							</a>
						</li>
                        <li class="sidebar-item">
							 <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-kompetensi') }}" aria-expanded="false">
								<i class="mdi mdi-library"></i>
									<span class="hide-menu">Data Kompetensi</span>
							</a>
						</li>
                        <li class="sidebar-item">
							 <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-kelas') }}" aria-expanded="false">
								<i class="mdi mdi-home-variant"></i>
									<span class="hide-menu">Data Kelas</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-spp') }}" aria-expanded="false">
								<i class="mdi mdi-cash-usd"></i>
									<span class="hide-menu">Data SPP</span>
							</a>
						</li>
                              @endif
                              @if(auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
						<li class="sidebar-item">
							<a class="sidebar-liauth()->user()->level == 'admin'nk waves-effect waves-dark sidebar-link" href="{{ url('dashboard/pembayaran') }}" aria-expanded="false">
								<i class="mdi mdi-cash"></i>
									<span class="hide-menu">Entri Transaksi Pembayaran</span>
							</a>
						</li>
                              @endif                       
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/histori') }}" aria-expanded="false">
								<i class="mdi mdi-note-multiple"></i>
									<span class="hide-menu">History Pembayaran</span>
							</a>
						</li>
                              @if(auth()->user()->level == 'admin')
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/laporan') }}" aria-expanded="false">
								<i class="mdi mdi-file-document"></i>
									<span class="hide-menu">Generate Laporan</span>
							</a>
					     </li>
				         @endif  
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
							@yield('breadcrumb')	                                  
                                </ol>
                            </nav>
                        </div>
                    </div>             
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Content -->
                <!-- ============================================================== -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- End content -->
                <!-- ============================================================== -->
         
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	<script>
		@yield('sweet')
		
		@yield('js')
	</script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>