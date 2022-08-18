@extends('layout.layout')

@section('content')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Add Barang Keluar</h4>
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
						<a href="#">Forms</a>
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
							<div class="card-title">Add Barang Keluar</div>
						</div>
						<form enctype="multipart/form-data" method="POST" action="/brg_keluar/store">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>No Barang Keluar</label>
									<input type="text" class="form-control" placeholder="No Barang Keluar ..." readonly="" value="{{ 'NBK-'.$kd }}" name="no_brg_keluar" required>
								</div>

								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" class="form-control" name="tgl_keluar" required>
								</div>

								<div class="form-group">
									<label>Nama Barang</label>
									<select class="form-control" name="id_barang" id="id_barang" required>
										<option value="" hidden="">-- Pilih Barang --</option>
										@foreach ($barang as $b)
										<option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
										@endforeach
									</select>
								</div>

								<div id="detail_barang"></div>

								<div class="form-group">
									<label>Jumlah Barang</label>
									<div class="input-group mb-3">
										<input type="number" class="form-control" placeholder="Jumlah Barang ..." name="jml_barang_keluar" required>
										<div class="input-group-append">
											<span class="input-group-text" id="basic-addon2">Unit</span>
										</div>
									</div>
								</div>
							</div>
							<div class="card-action">
								<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
								<a href="/brg_keluar" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$("#jml_barang_masuk").keyup(function(){
			var jml_barang_masuk 	= $("#jml_barang_masuk").val();
			var harga		= $("#harga").val();

			var total			= parseInt(harga) * parseInt(jml_barang_masuk);
			$("#total").val(total);
		});
	});
</script> -->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>
<script type="text/javascript">
	$("#id_barang").change(function() {
		var id_barang = $("#id_barang").val();
		$.ajax({
			type: "GET",
			url: "/brg_keluar/ajax",
			data: "id_barang=" + id_barang,
			cache: false,
			success: function(data) {
				$('#detail_barang').html(data);
			}
		});
	});
</script>
@endsection