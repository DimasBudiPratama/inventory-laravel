@extends('layout.layout')
<!-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) -->
@section('content')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Laporan Data Barang Masuk</h4>
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
						<a href="#">Laporan Barang Masuk</a>
					</li>
				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Laporan Data Barang</h4>
								<button data-toggle="modal" data-target="#modalCetak" class="btn btn-primary btn-round ml-auto">
									<i class="fa fa-print"></i>
									Cetak
								</button>
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

<!-- Modal Cetak -->
<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Cetak Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="GET" target="_blank" enctype="multipart/form-data" action="/lap_barang_masuk/cetak_barang_masuk">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Tanggal Mulai</label>
						<input type="date" class="form-control" name="tgl_mulai" required>
					</div>
					<div class="form-group">
						<label>Tanggal Selesai</label>
						<input type="date" class="form-control" name="tgl_selesai" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection