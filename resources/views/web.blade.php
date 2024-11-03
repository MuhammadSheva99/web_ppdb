<!-- resources/views/web.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Web Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Web Dashboard</h1>
        <p>Selamat datang di dashboard Admin Web. Kelola aplikasi dari sini.</p>

        <!-- Panel Ringkasan -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Halaman Beranda</h5>
                        <p class="card-text">Edit konten beranda.</p>
                        <a href="#" class="btn btn-light btn-sm">Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Blog & Artikel</h5>
                        <p class="card-text">Tambah dan kelola artikel blog.</p>
                        <a href="#" class="btn btn-light btn-sm">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Kontak</h5>
                        <p class="card-text">Perbarui informasi kontak.</p>
                        <a href="#" class="btn btn-light btn-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data Artikel -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Daftar Artikel Blog</h5>
                <a href="#" class="btn btn-primary btn-sm float-right">Tambah Artikel</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data statis, data sesungguhnya akan diambil dari database -->
                        <tr>
                            <td>1</td>
                            <td>Tips Pendaftaran PPDB</td>
                            <td>2024-10-15</td>
                            <td>
                                <button class="btn btn-sm btn-info">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pentingnya Memilih Sekolah yang Tepat</td>
                            <td>2024-09-30</td>
                            <td>
                                <button class="btn btn-sm btn-info">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambahkan lebih banyak data sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Informasi Kontak</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email kontak" value="admin@ppdb.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" placeholder="Nomor telepon" value="+62 812 3456 7890">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
