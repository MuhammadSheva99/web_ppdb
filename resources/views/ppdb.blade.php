<!-- resources/views/ppdb.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PPDB Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin PPDB Dashboard</h1>
        <p>Selamat datang di dashboard Admin PPDB. Kelola data pendaftaran siswa dari sini.</p>

        <!-- Panel Ringkasan Data -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendaftar</h5>
                        <p class="card-text" id="totalPendaftar">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Diterima</h5>
                        <p class="card-text" id="totalDiterima">80</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Cadangan</h5>
                        <p class="card-text" id="totalCadangan">20</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Ditolak</h5>
                        <p class="card-text" id="totalDitolak">50</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data Pendaftar -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Data Pendaftaran Siswa</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Jalur</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data statis, data sesungguhnya akan diambil dari database -->
                        <tr>
                            <td>1</td>
                            <td>Ahmad Satria</td>
                            <td>SMPN 1 Jakarta</td>
                            <td>Zonasi</td>
                            <td><span class="badge badge-success">Diterima</span></td>
                            <td>
                                <button class="btn btn-sm btn-info">Detail</button>
                                <button class="btn btn-sm btn-success">Terima</button>
                                <button class="btn btn-sm btn-warning">Cadangkan</button>
                                <button class="btn btn-sm btn-danger">Tolak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Aisyah</td>
                            <td>SMPN 2 Jakarta</td>
                            <td>Prestasi</td>
                            <td><span class="badge badge-warning">Cadangan</span></td>
                            <td>
                                <button class="btn btn-sm btn-info">Detail</button>
                                <button class="btn btn-sm btn-success">Terima</button>
                                <button class="btn btn-sm btn-warning">Cadangkan</button>
                                <button class="btn btn-sm btn-danger">Tolak</button>
                            </td>
                        </tr>
                        <!-- Tambahkan lebih banyak data sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
