@extends('layout.layout')

@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
					@if (auth()->user()->level==1)
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data User</p>
												<h4 class="card-title">{{ $user }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="far fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data Barang</p>
												<h4 class="card-title">{{ $barang }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="flaticon-success"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data Barang Masuk Hari Ini</p>
												<h4 class="card-title">{{ $brg_masuk_today }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="fa fa-truck"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Data Barang Keluar Hari Ini</p>
												<h4 class="card-title">{{ $brg_keluar_today }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif
					@if (auth()->user()->level==2)
						<div class="col-md-12">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-primary bubble-shadow-small">
													<i class="fas fa-users"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
												<p class="card-category">Data Barang Masuk Hari Ini</p>
													<h4 class="card-title">{{ $brg_masuk_today }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif
					@if (auth()->user()->level==3)
						<div class="col-md-12">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-primary bubble-shadow-small">
													<i class="fas fa-users"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
												<p class="card-category">Data Barang Keluar Hari Ini</p>
													<h4 class="card-title">{{ $brg_keluar_today }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif
					<!-- <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Grafik</div>
									
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="min-height: 375px">
										<canvas id="statisticsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			
		</div>

@endsection