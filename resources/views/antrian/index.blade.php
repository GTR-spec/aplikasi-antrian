<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrian Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Daftar Antrian Kendaraan</h4>
                        <div>
                            <a href="{{ route('kendaraan.create') }}" class="btn btn-success btn-sm me-2">+ Tambah Kendaraan</a>
                            <a href="{{ route('laporan.pdf') }}" class="btn btn-light btn-sm" target="_blank">Cetak Laporan PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Antrian</th>
                                        <th>Nomor Polisi</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Nama Pemilik</th>
                                        <th>Tanggal / Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($antrians as $index => $antrian)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $antrian->nomor_antrian }}</strong></td>
                                            <td>{{ $antrian->kendaraan->nomor_polisi ?? '-' }}</td>
                                            <td>{{ $antrian->kendaraan->jenis_kendaraan ?? '-' }}</td>
                                            <td>{{ $antrian->kendaraan->nama_pemilik ?? '-' }}</td>
                                            <td>{{ $antrian->tanggal }} {{ $antrian->waktu }}</td>
                                            <td>
                                                @if($antrian->status_antrian == 'Menunggu')
                                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                                @elseif($antrian->status_antrian == 'Diproses')
                                                    <span class="badge bg-primary">Diproses</span>
                                                @elseif($antrian->status_antrian == 'Selesai')
                                                    <span class="badge bg-success">Selesai</span>
                                                @else
                                                    <span class="badge bg-danger">Batal</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">Belum ada data antrian kendaraan di database.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>