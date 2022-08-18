@extends('layout.layout')

@section('content')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Barang Keluar</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="/home">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Barang Keluar</a>
					</li>
				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Tambah Data</h4>
								@if (auth()->user()->level==3)
								<a class="btn btn-primary btn-round ml-auto" href="/brg_keluar/create">
									<i class="fa fa-plus"></i>
									Tambah Data
								</a>
								@endif
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
											<th>No Barang Keluar</th>
											<th>Nama Barang</th>
											<th>Teknisi</th>
											<th>Tanggal Keluar</th>
											<th>Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach ($brg_keluar as $data)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$data->no_brg_keluar}}</td>
											<td>{{$data->nama_barang}}</td>
											<td>{{$data->name}}</td>
											<td>{{date('d F Y', strtotime($data->tgl_keluar))}}</td>
											<td>{{$data->jml_barang_keluar}} Unit</td>
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