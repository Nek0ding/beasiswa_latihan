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
        <div class="title">
            <h3 class="text-center fw-bold mt-3">Pendaftaran Beasiswa</h3>
            <h3 class="text-center fw-bold mt-3">Isi Formulir Dibawah ini</h3>
        </div>
        <div class="row">
            <div class="col-6 m-auto">
                <form action="{{ route('daftar.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('post')

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Nama</label>
                        <input type="text" class="form-control" id="nama_pendaftar" name="nama"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Masukkan Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="nomor" name="nomor">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Semester Saat Ini</label>
                        <select name="semester" id="semester" name="semester" class="form-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">IPK Terakhir</label>
                        <input type="text" class="form-control" id="ipk_disabled" value="{{ $ipk_random }}"
                            name="ipk_disabled" disabled>
                            <input type="text" class="form-control" id="ipk" value="{{ $ipk_random }}"
                            name="ipk_random" hidden>
                    </div>
                    @if ($ipk_random < 3)
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Pilihan Beasiswa</label>
                            <select id="pilihan_beasiswa" class="form-select" name="pilihan_beasiswa" disabled>
                                <option value="0">Tidak dapat dipilih</option>
                            </select>
                        </div>
                    @elseif ($ipk_random >= 3)
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Pilihan Beasiswa</label>
                            <select id="pilihan_beasiswa" class="form-select" name="pilihan_beasiswa">
                                @foreach ($beasiswa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_beasiswa }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Upload Berkas Syarat</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    @if ($ipk_random < 3)
                        <button type="submit" class="btn btn-primary" disabled>Submit</button>
                    @elseif($ipk_random >= 3)
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
