<!-- resources/views/kuota.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuota Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Kuota Pendaftaran</h1>
        <p class="text-center">Total Kuota: <strong>300 Orang</strong></p>

        <!-- Tabel Kuota Pendaftaran -->
        <div class="table-responsive">
            <table class="table table-bordered mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Kategori</th>
                        <th scope="col">Kuota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Zonasi</td>
                        <td>150 Orang</td>
                    </tr>
                    <tr>
                        <td>Prestasi</td>
                        <td>90 Orang</td>
                    </tr>
                    <tr>
                        <td>Afirmasi</td>
                        <td>45 Orang</td>
                    </tr>
                    <tr>
                        <td>Perpindahan Orang Tua</td>
                        <td>15 Orang</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th>300 Orang</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>