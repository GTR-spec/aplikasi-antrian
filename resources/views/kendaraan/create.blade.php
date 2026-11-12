<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Data Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kendaraan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Pemilik (User Akun)</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">-- Pilih User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" placeholder="Contoh: B 1234 XYZ" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" placeholder="Contoh: Mobil / Truk / Motor" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik / Pengendara</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Nama lengkap" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>