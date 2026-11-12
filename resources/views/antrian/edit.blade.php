<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Antrian Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Data Antrian Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('antrian.update', $antrian->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nomor_antrian" class="form-label">Nomor Antrian</label>
                                <input type="text" class="form-control" id="nomor_antrian" name="nomor_antrian" value="{{ $antrian->nomor_antrian }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="{{ $antrian->kendaraan->nomor_polisi ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" value="{{ $antrian->kendaraan->jenis_kendaraan ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik / Pengendara</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ $antrian->kendaraan->nama_pemilik ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status_antrian" class="form-label">Status Antrian</label>
                                <select name="status_antrian" id="status_antrian" class="form-control" required>
                                    <option value="Menunggu" {{ $antrian->status_antrian == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="Diproses" {{ $antrian->status_antrian == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ $antrian->status_antrian == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Batal" {{ $antrian->status_antrian == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>