<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Barang Masuk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body style="background-color:white;" onload="window.print()">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <h2><img src="{{ URL::to('assets/logo/itn.png') }}" width="80px" height="80px" alt="Logo" style="position:absolute; left: 70px"> <b style="color:red;">Indonesia Trans Network</b>
                                </h2>
                                <span style="line-height: 1.6; font-weight: bold;">
                                    Jl. Kimaja(Kimaja Icon), samping Jaya Bakery, 10m sebelum fly over Tanjung Senang, Bandar Lampung
                                </span>
                            </td>
                        </tr>
                    </table>
                    <hr class="line-title">
                    <p align="center">
                        LAPORAN DATA BARANG MASUK
                    </p>
                    </hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>No Barang Masuk</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah</th>
                        </tr>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>