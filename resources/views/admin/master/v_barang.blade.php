@extends('layout.layout')

@section('content')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Barang</h4>
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
						<a href="#">Data Master</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Barang</a>
					</li>
				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Tambah Data</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
									<i class="fa fa-plus"></i>
									Tambah Data
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
											<th>Nama Barang</th>
											<th>Deskripsi</th>
											<th>Stok</th>
											<th>Satuan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach ($barang as $data)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$data->nama_barang}}</td>
											<td>{{$data->deskripsi}}</td>
											<td>{{$data->stok}} Unit </td>
											<td>{{$data->satuan}}</td>
											<td>
												<a href="#modalEditBarang{{ $data->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
												<a href="#modalHapusBarang{{ $data->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
											</td>
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

<!-- Tambah-->
<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Add Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/barang/store">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang ..." required>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi ...">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" placeholder="Stok" name="stok">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">Unit</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Meter" name="satuan">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit-->
@foreach($barang as $d)
<div class="modal fade" id="modalEditBarang{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/barang/{{ $d->id }}/update">
				@csrf
				<div class="modal-body">

					<input type="hidden" value="{{ $d->id }}" name="id" required>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" value="{{ $d->nama_barang }}" class="form-control" name="nama_barang" placeholder="Nama Barang ..." required>
					</div>
					<!-- <div class="form-group">
						<label>Kategori</label>
						<select name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ $d->nama_kategori }}" id="choices-jeniskelamin">
							<option value="{{ $d->nama_kategori }}">{{ $d->nama_kategori }}</option>
							<option value="TIPE A">TIPE A</option>
							<option value="TIPE B">TIPE B</option>
							<option value="TIPE C">TIPE C</option>
							<option value="TIPE D">TIPE D</option>
						</select>
					</div> -->
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" value="{{ $d->deskripsi }}" class="form-control" name="deskripsi" placeholder="Deskripsi ..." required>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" placeholder="Stok" value="{{ $d->stok }}" name="stok" required>
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">Unit</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Meter" value="{{ $d->satuan }}" name="satuan" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

@foreach($barang as $g)
<div class="modal fade" id="modalHapusBarang{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="GET" enctype="multipart/form-data" action="/barang/{{ $d->id }}/destroy">
				@csrf
				<div class="modal-body">

					<input type="hidden" value="{{ $d->id }}" name="id" required>
					<div class="form-group">
						<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

@endsection