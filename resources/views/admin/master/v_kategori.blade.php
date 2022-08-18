@extends('layout.layout')

@section('content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Kategori</h4>
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
								<a href="#">Kategori</a>
							</li>
						</ul>
					</div>
					<div class="row">
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Data</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddKategori">
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
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Kategori</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												@foreach ($kategori as $data)
												<tr>
													<td>{{$no++}}</td>
													<td>{{$data->nama_kategori}}</td>
													<td>
													<a href="#modalEditKategori{{ $data->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
														<a href="#modalHapusKategori{{ $data->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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
        <div class="modal fade" id="modalAddKategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
                    <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Add Kategori</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					</div>
                    <form method="POST" enctype="multipart/form-data" action="/kategori/store">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori ..." required>
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
        @foreach($kategori as $d)
        <div class="modal fade" id="modalEditKategori{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
                    <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Kategori</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					</div>
                    <form method="POST" enctype="multipart/form-data" action="/kategori/{{ $d->id }}/update">
                        @csrf
                    <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" value="{{ $d->nama_kategori }}" class="form-control" name="nama_kategori" placeholder="Nama Kategori ..." required>
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

		@foreach($kategori as $g)
        <div class="modal fade" id="modalHapusKategori{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
                    <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Hapus Kategori</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					</div>
                    <form method="GET" enctype="multipart/form-data" action="/kategori/{{ $d->id }}/destroy">
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