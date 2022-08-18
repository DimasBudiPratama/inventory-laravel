<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Barang</title>
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
                        LAPORAN DATA BARANG
                    </p>
                    </hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                        </tr>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>