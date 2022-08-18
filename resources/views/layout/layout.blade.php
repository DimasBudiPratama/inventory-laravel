<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sistem Inventory</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="/assets/img/itn.png" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="/assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="#" class="logo">
					<img src="/assets/img/itn.png" width="100px" height="50px" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<!-- <div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div> -->
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="../../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{Auth::user()->name }}</h4>
											<p class="text-muted">{{Auth::user()->email }}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="btn btn-rounded btn-danger btn-sm m-2">
                                        @csrf
										<button class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-lock"></i> Logout</button>
                                    </form>
									
									
									
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								{{Auth::user()->name }}
									<span class="user-level">
									@if (auth()->user()->level==1)
										Admin
									@elseif (auth()->user()->level==2)
										Inventaris
										@elseif (auth()->user()->level==3)
										Teknisi
									@endif
									</span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a class="collapse show" href="{{route('home')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						@if (auth()->user()->level==1)
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('user')}}">
											<span class="sub-item">Data User</span>
										</a>
									</li>
									<!-- <li>
										<a href="{{route('kategori')}}">
											<span class="sub-item">Data Kategori</span>
										</a>
									</li> -->
									<li>
										<a href="{{route('barang')}}">
											<span class="sub-item">Data Barang</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#laporan">
								<i class="fas fa-file"></i>
								<p>Data Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="laporan">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('lap_barang')}}">
											<span class="sub-item">Laporan Barang</span>
										</a>
									</li>
									<li>
										<a href="{{route('lap_barang_masuk')}}">
											<span class="sub-item">Laporan Barang Masuk</span>
										</a>
									</li>
									<li>
										<a href="{{route('lap_barang_keluar')}}">
											<span class="sub-item">Laporan Barang Keluar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- <li class="nav-item">
							<a class="collapse show" href="{{route('brg_masuk1')}}">
								<i class="fas fa-briefcase"></i>
								<p>Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="collapse show" href="{{route('brg_keluar1')}}">
								<i class="fas fa-briefcase"></i>
								<p>Barang Keluar</p>
							</a>
						</li> -->
						@endif
						@if (auth()->user()->level==2)
						<li class="nav-item">
							<a class="collapse show" href="{{route('brg_masuk')}}">
								<i class="fas fa-briefcase"></i>
								<p>Barang Masuk</p>
							</a>
						</li>
						@endif
						@if (auth()->user()->level==3)
						<li class="nav-item">
							<a class="collapse show" href="{{route('brg_keluar')}}">
								<i class="fas fa-briefcase"></i>
								<p>Barang Keluar</p>
							</a>
						</li>
						@endif
						<!-- <li class="nav-item active submenu">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Tables</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="../tables/tables.html">
											<span class="sub-item">Basic Table</span>
										</a>
									</li>
									<li class="active">
										<a href="../tables/datatables.html">
											<span class="sub-item">Datatables</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	@yield('content')
	</div>
	<!--   Core JS Files   -->
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="/assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="/assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="/assets/js/setting-demo.js"></script>
	<!-- Sweet Alert -->
	<script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	@if (session('success'))
	<script>
		var SweetAlert2Demo = function(){

			var initDemos = function(){
				swal({
					title:	"{{ session('success')}}",
					text:	"{{ session('success')}}",
					icon:	"success",
					buttons:{
						confirm: {
							text:	"Confirm Me",
							value:	true,
							visible:true,
							className: "btn btn-success",
							closeModal: true
						}
					}
				});
			};

			return {
				init: function(){
					initDemos();
				},
			};
		}();

		jQuery(document).ready(function(){
			SweetAlert2Demo.init();
		});
	</script>
	@endif
	@if (session('error'))
	<script>
		var SweetAlert2Demo = function(){

			var initDemos = function(){
				swal({
					title:	"{{ session('error')}}",
					text:	"{{ session('error')}}",
					icon:	"error",
					buttons:{
						confirm: {
							text:	"Confirm Me",
							value:	true,
							visible:true,
							className: "btn btn-success",
							closeModal: true
						}
					}
				});
			};

			return {
				init: function(){
					initDemos();
				},
			};
		}();

		jQuery(document).ready(function(){
			SweetAlert2Demo.init();
		});
	</script>
	@endif
	<script >
		$(document).ready(function() {
			$('#add-row').DataTable({
			});

		});
	</script>
</body>
</html>