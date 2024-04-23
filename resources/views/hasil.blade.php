<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ml-5">
        <a class="navbar-brand" href="#">Pendaftaran Beasiswa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Pilihan Beasiswa</a>
                <a class="nav-item nav-link" href="{{ route('daftar.index') }}">Daftar</a>
                <a class="nav-item nav-link" href="{{ route('hasil.index') }}">Hasil</a>
            </div>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div id="index-rejected" class="index-rejected">
                    @if (session('message'))
                        <div class="bg-primary p-5">
                            <div class="header-title">
                                <h1 class="index-rejected-header-title-text">{{ session('message') }}
                                </h1>
                                <h5 class="index-rejected-header-title-sub">SILAHKAN TUNGGU VERFIKASI</h5>
                            </div>
                        </div>
                    @endif
                    <div class="tabel-pendaftar">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Semester</th>
                                <th>IPK</th>
                                <th>Pilihan Beasiswa</th>
                                <th>Status Pengajuan</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->semester }}</td>
                                        <td>{{ $item->ipk }}</td>
                                        @foreach ($jenis_beasiswa as $beasiswa)
                                            @if ($item->pilihan_beasiswa == $beasiswa->id)
                                                <td>{{ $beasiswa->nama_beasiswa }}</td>
                                            @endif
                                        @endforeach
                                        @if ($item->status_pengajuan == 'Diterima')
                                            <td><span class="badge" style="background-color:#00ff2a">Diterima<span>
                                            </td>
                                        @elseif ($item->status_pengajuan == 'Belum Diverifikasi')
                                            <td><span class="badge" style="background-color:#e1ff00">Belum
                                                    Diverifikasi<span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
