@extends('layout.layout')

@section('content')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Barang Masuk</h4>
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
						<a href="#">Barang Masuk</a>
					</li>
				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Tambah Data</h4>
								@if (auth()->user()->level==2)
								<a class="btn btn-primary btn-round ml-auto" href="/brg_masuk/create">
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
											<th>No Barang Masuk</th>
											<th>Nama Barang</th>
											<th>Satuan</th>
											<th>Tanggal Masuk</th>
											<th>Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach ($brg_masuk as $data)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$data->no_brg_masuk}}</td>
											<td>{{$data->nama_barang}}</td>
											<td>{{$data->satuan}}</td>
											<td>{{date('d F Y', strtotime($data->tgl_masuk))}}</td>
											<td>{{$data->jml_barang_masuk}} Unit</td>
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