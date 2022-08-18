@extends('layout.layout')
<!-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) -->
@section('content')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Laporan Data Barang</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Laporan</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Laporan Barang</a>
					</li>
				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Laporan Data Barang</h4>
								<a href="/lap_barang/cetak_barang" target="_blank" class="btn btn-primary btn-round ml-auto">
									<i class="fa fa-print"></i>
									Cetak
								</a>
							</div>
						</div>
						<div class="card-body">
							<!-- @if (session('success'))
									<div class="alert alert-success" role="alert">
										{{ session('success') }}
									</div>
								@endif -->
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Deskripsi</th>
											<th>Stok</th>
											<th>Satuan</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach ($barang as $data)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$data->nama_barang}}</td>
											<td>{{$data->deskripsi}}</td>
											<td>{{$data->stok}} Unit</td>
											<td>{{$data->satuan}}</td>
										</tr>
										@endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection