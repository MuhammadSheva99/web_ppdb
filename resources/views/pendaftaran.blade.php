<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDB - Sekolah Programmer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select {
            width: 50%; /* Mengatur lebar input field menjadi 90% */
            padding: 5px;
            margin-bottom: 5px;
        }
        button {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #1a252f;
        }
        .additional-section {
            display: none;
        }
    </style>

    <script>
        // Fungsi untuk menampilkan bagian jalur pendaftaran yang sesuai
        function checkJalur() {
            var jalur = document.getElementById("jalur").value;
            var zonasiSection = document.getElementById("zonasi-section");
            var afirmasiSection = document.getElementById("afirmasi-section");
            var perpindahanSection = document.getElementById("perpindahan-section");
            var prestasiSection = document.getElementById("prestasi-section");

            zonasiSection.style.display = jalur === "zonasi" ? "block" : "none";
            afirmasiSection.style.display = jalur === "afirmasi" ? "block" : "none";
            perpindahanSection.style.display = jalur === "perpindahan_orangtua" ? "block" : "none";
            prestasiSection.style.display = jalur === "prestasi" ? "block" : "none";
        }

        function tambahKejuaraan() {
            var container = document.getElementById('kejuaraan-container');
            var newKejuaraan = document.createElement('div');
            newKejuaraan.classList.add('kejuaraan-container');
            newKejuaraan.innerHTML = `
                <label>Kejuaraan:</label>
                <input type="text" name="kejuaraan[]" placeholder="Nama Kejuaraan"><br>

                <label>Tingkat Kejuaraan:</label>
                <select name="tingkat_kejuaraan[]">
                    <option value="kota">Kota</option>
                    <option value="provinsi">Provinsi</option>
                    <option value="nasional">Nasional</option>
                    <option value="internasional">Internasional</option>
                </select><br>
                <label>Unggah Sertifikat (PDF/JPG/PNG):</label>
                <input type="file" name="sertifikat[]"><br><br>
            `;
            container.appendChild(newKejuaraan);
        }
    </script>
</head>
<body>
    @include('nav')

    <div class="form-container">
        <h1>Formulir Pendaftaran Sekolah Programmer</h1>

        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            <!-- Pilihan Jalur Pendaftaran -->
            <label>Pilih Jalur Pendaftaran:</label>
            <select name="jalur" id="jalur" onchange="checkJalur()" required style="width: 200px;">
                <option value="zonasi">Zonasi</option>
                <option value="prestasi">Prestasi</option>
                <option value="afirmasi">Afirmasi</option>
                <option value="perpindahan_orangtua">Perpindahan Orang Tua</option>
            </select><br>

            <div id="zonasi-section" class="additional-section">
                <h3>Data Tambahan Jalur Zonasi</h3>
            
                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 350px; font-size: 20px; margin-bottom: 5px"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px; margin-bottom: 5px"><br>
                            </div>
                            <div>
                                <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px; margin-bottom: 5px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                            </div>
                        </div><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Tempat Lahir:</label>
                                <select id="tempat_lahir" name="tempat_lahir" required style="width: 150px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                            <div>
                                <label>Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" required style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
            
            
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text" name="kecamatan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Provinsi:</label>
                                <input type="text" name="provinsi" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>

                        <label>Telepon:</label>
                        <input type="text" name="telepon" maxlength="14" required style="width: 150px; margin-bottom: 5px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                        <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px; margin-bottom: 5px;"><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text" name="kecamatan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Provinsi:</label>
                                <input type="text" name="provinsi" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px; margin-bottom: 5px;"><br>
                    </div>
            
                    <!-- Kolom Kanan -->
                    <div style="flex: 1;">
                        <!-- Bagian Unggahan dan Jarak -->
                        <!-- Bagian Unggahan -->
                    <div style="margin-top: 20px;">
                        
                        <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 5px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>
                        
                        <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                        <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
                        <br>
                        <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 5px;">
                        <br>
                        <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
                        <br><br>
            
                        <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                        <input type="file" name="kk" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
                        <br>
                        <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 5px;">
                        <br>
                        <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
                        <br><br>
            
                        <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                        <input type="file" name="skl" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
                        <br>
                        <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 5px;">
                        <br>
                        <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
                    </div>
            
                    <script>
                    // Fungsi untuk mempreview gambar yang diunggah
                    function previewImage(event, previewId, deleteButtonId) {
                        var input = event.target;
                        var reader = new FileReader();
                        
                        reader.onload = function() {
                            var preview = document.getElementById(previewId);
                            preview.src = reader.result;
                            preview.style.display = 'block'; // Tampilkan gambar preview
                            
                            var deleteButton = document.getElementById(deleteButtonId);
                            deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                        };
                        
                        reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
                    }
            
                    // Fungsi untuk menghapus gambar dan reset input
                    function deleteImage(inputId, previewId, deleteButtonId) {
                        var input = document.getElementById(inputId);
                        var preview = document.getElementById(previewId);
                        var deleteButton = document.getElementById(deleteButtonId);
            
                        input.value = ''; // Reset input file
                        preview.src = ''; // Hapus gambar preview
                        preview.style.display = 'none'; // Sembunyikan gambar preview
                        deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
                    }
                    
                    </script>
            
                    <!-- Field untuk Input Lokasi -->

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label for="lat_rumah">Latitude Rumah:</label>
                            <input type="text" id="lat_rumah" name="lat_rumah" required style="width: 150px; margin-bottom: 5px;"><br>                            
                         </div>
                        <div style="margin-right: 10px;">
                            <label for="lon_rumah">Longitude Rumah:</label>
                            <input type="text" id="lon_rumah" name="lon_rumah" required style="width: 150px; margin-bottom: 5px;"><br>
                        </div>
                    </div><br>

                       <!-- Hidden field untuk latitude dan longitude sekolah -->
            <input type="hidden" id="lat_sekolah" name="lat_sekolah" value="-6.200000">
            <input type="hidden" id="lon_sekolah" name="lon_sekolah" value="106.816666">

                        <label>Jarak Rumah ke Sekolah:</label>
                        <input type="text" id="jarak_rumah_sekolah" name="jarak_rumah_sekolah" required style="width: 150px; margin-bottom: 5px;" readonly><br>
                    </div>
                </div>
                        <!-- Tambahkan teks Syarat dan Ketentuan di atas checkbox -->
                <div style="margin-bottom: 10px;">
                    <a href="#" onclick="showTermsPopup()" style="text-decoration: underline; color: blue;">Syarat dan Ketentuan</a>
                </div>

                <!-- Pop-up Syarat dan Ketentuan -->
                <div id="termsPopup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                    <div style="position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; width: 80%; max-width: 600px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h3 style="text-align: center;">Syarat dan Ketentuan PPDB</h3>
                        
                        <!-- Syarat dan ketentuan dalam kolom bergulir -->
                        <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                            <p>1. Calon peserta didik harus memenuhi semua persyaratan yang ditetapkan oleh sekolah.</p>
                            <p>2. Informasi yang diberikan harus benar dan sesuai dengan data asli yang dimiliki oleh calon peserta didik.</p>
                            <p>3. Kelalaian atau kesalahan dalam pengisian data dapat mengakibatkan penolakan atau pembatalan pendaftaran.</p>
                            <p>4. Semua dokumen yang diunggah harus dalam format yang sesuai (PDF, JPG, atau PNG) dan jelas.</p>
                            <p>5. Jarak antara rumah dan sekolah akan dihitung berdasarkan data yang diberikan dan dapat mempengaruhi penerimaan.</p>
                            <p>6. Dengan menyetujui, calon peserta didik atau wali murid menyatakan bahwa mereka bertanggung jawab penuh atas informasi yang diberikan.</p>
                        </div>
                        
                        <!-- Checkbox dan teks persetujuan -->
                        <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                            <input type="checkbox" id="agreeCheckbox">
                            <label for="agreeCheckbox">Saya setuju dengan syarat dan ketentuan yang ada</label>
                        </div>
                        
                        <!-- Tombol tutup -->
                        <button onclick="hideTermsPopup()" style="margin-top: 15px; padding: 10px; width: 100%;">Tutup</button>
                    </div>
                </div>
                
                <script>
                    function hideTermsPopup() {
                        document.getElementById("termsPopup").style.display = "none";
                    }
                </script>
                

              <!-- Checkbox Setuju -->
<div style="display: flex; align-items: center; gap: 20px; margin-top: 10px;">
    <div style="display: flex; align-items: center;">
        <input type="checkbox" id="terms" name="terms" required onchange="toggleSubmitButton()">
        <label for="terms" style="margin-left: 5px;">Saya setuju dengan syarat dan ketentuan.</label>
    </div>
</div>

                <!-- Tombol Daftar -->
                <div style="margin-top: 10px;">
                    <button id="submit-btn" type="submit" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
                     <button type="button" onclick="openPreview()">Preview Dokumen</button>
                </div>

                

                <script>
                    // Fungsi untuk menampilkan pop-up syarat dan ketentuan
                    function showTermsPopup() {
                        document.getElementById('termsPopup').style.display = 'block';
                    }

                    // Fungsi untuk menyembunyikan pop-up syarat dan ketentuan
                    function hideTermsPopup() {
                        document.getElementById('termsPopup').style.display = 'none';
                    }

                    // Fungsi untuk mengaktifkan tombol submit jika checkbox disetujui
                    function toggleSubmitButton() {
                        const terms = document.getElementById('terms').checked;
                        const responsibility = document.getElementById('responsibility').checked;
                        document.getElementById('submit-btn').disabled = !(terms && responsibility);
                    }
                </script>

            
            </div>
            
            <!-- Script untuk Google Maps dan menghitung jarak serta menampilkan rute -->
            <script>
                var map, directionsService, directionsRenderer;
            
                function initMap() {
                    directionsService = new google.maps.DirectionsService();
                    directionsRenderer = new google.maps.DirectionsRenderer();
            
                    map = new google.maps.Map(document.getElementById('map-canvas'), {
                        center: { lat: -6.200000, lng: 106.816666 }, // Lokasi default
                        zoom: 10
                    });
            
                    directionsRenderer.setMap(map);
                }
            
                function drawRoute(latRumah, lonRumah, latSekolah, lonSekolah) {
                    const request = {
                        origin: { lat: latRumah, lng: lonRumah },
                        destination: { lat: latSekolah, lng: lonSekolah },
                        travelMode: 'DRIVING'
                    };
            
                    directionsService.route(request, function(result, status) {
                        if (status === 'OK') {
                            directionsRenderer.setDirections(result);
                        } else {
                            alert('Gagal menampilkan rute: ' + status);
                        }
                    });
                }
            
                function haversine(lat1, lon1, lat2, lon2) {
                    const R = 6371; // Radius bumi dalam kilometer
                    const dLat = (lat2 - lat1) * Math.PI / 180;
                    const dLon = (lon2 - lon1) * Math.PI / 180;
                    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                              Math.sin(dLon / 2) * Math.sin(dLon / 2);
                    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                    return R * c; // Jarak dalam kilometer
                }
            
                function hitungJarak() {
                    const latRumah = parseFloat(document.getElementById("lat_rumah").value);
                    const lonRumah = parseFloat(document.getElementById("lon_rumah").value);
                    const latSekolah = parseFloat(document.getElementById("lat_sekolah").value);
                    const lonSekolah = parseFloat(document.getElementById("lon_sekolah").value);
            
                    if (!isNaN(latRumah) && !isNaN(lonRumah)) {
                        const jarak = haversine(latRumah, lonRumah, latSekolah, lonSekolah);
                        document.getElementById("jarak_rumah_sekolah").value = jarak.toFixed(2) + " km";
            
                        drawRoute(latRumah, lonRumah, latSekolah, lonSekolah);
                    } else {
                        document.getElementById("jarak_rumah_sekolah").value = "Masukkan koordinat rumah!";
                    }
                }
            
                document.getElementById("lat_rumah").addEventListener("input", hitungJarak);
                document.getElementById("lon_rumah").addEventListener("input", hitungJarak);
            
                window.onload = initMap;
            </script>
            
            <!-- Pastikan untuk mengganti API Key dengan milik Anda -->
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
            
             <!-- Bagian khusus untuk jalur Prestasi -->
             <div id="prestasi-section" class="additional-section">
                <h3>Data Tambahan Jalur Prestasi</h3>
            
                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 350px; font-size: 20px; margin-bottom: 5px"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px; margin-bottom: 5px"><br>
                            </div>
                            <div>
                                <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px; margin-bottom: 5px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                            </div>
                        </div><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Tempat Lahir:</label>
                                <select id="tempat_lahir" name="tempat_lahir" required style="width: 150px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                            <div>
                                <label>Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" required style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
            
            
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text" name="kecamatan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Provinsi:</label>
                                <input type="text" name="provinsi" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>

                        <label>Telepon:</label>
                        <input type="text" name="telepon" maxlength="14" required style="width: 150px; margin-bottom: 5px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                        <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px; margin-bottom: 5px;"><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text" name="kecamatan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Provinsi:</label>
                                <input type="text" name="provinsi" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px; margin-bottom: 5px;"><br>
                    </div>
            
                    <script>
                        // Fungsi untuk memperbarui kota di jalur prestasi
                        function updateCitiesPrestasi() {
                            const countrySelect = document.getElementById("country-prestasi");
                            const citySelect = document.getElementById("city-prestasi");
                    
                            // Menghapus opsi kota yang ada
                            citySelect.innerHTML = "";
                    
                            // Mendapatkan negara yang dipilih
                            const selectedCountry = countrySelect.value;
                    
                            // Menambahkan opsi kota yang sesuai dengan negara yang dipilih
                            if (selectedCountry) {
                                const cities = countryCityData[selectedCountry];
                                cities.forEach(city => {
                                    const option = document.createElement("option");
                                    option.value = city;
                                    option.text = city;
                                    citySelect.add(option);
                                });
                            }
                        }
                    </script>
            
                    <div style="flex: 1;">
                        <!-- Bagian Unggahan dan Jarak -->
                        <div style="margin-top: 20px;">
                    <label>Pilih Jenis Prestasi:</label>
                    <select name="jenis_prestasi" required style="width: 130px;">
                        <option value="akademik">Akademik</option>
                        <option value="non_akademik">Non Akademik</option>
                    </select><br>
            
                    <div id="kejuaraan-container">
                        <label>Kejuaraan:</label>
                        <input type="text" name="kejuaraan[]" placeholder="Nama Kejuaraan"><br>
            
                        <label>Tingkat Kejuaraan:</label>
                        <select name="tingkat_kejuaraan[]" required style="width: 120px;">
                            <option value="kota">Kota</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select><br>
            
                        <button type="button" onclick="tambahKejuaraan()">+ Tambah Kejuaraan</button><br><br>
            
                    <!-- Bagian Unggahan dan Jarak -->
                    <div style="margin-top: 20px;">
                        <label>Unggah Sertifikat dan Foto Kejuaraan (PDF/JPG/PNG):</label>
                        <input type="file" name="sertifikat[]" accept="image/*" onchange="previewImage(event, 'sertifikatPreview', 'sertifikatDelete')" id="sertifikatInput">
                        <br>
                        <img id="sertifikatPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sertifikatDelete" style="display:none;" onclick="deleteImage('sertifikatInput', 'sertifikatPreview', 'sertifikatDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>
                        
                        <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                        <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
                        <br>
                        <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                        <input type="file" name="kk_prestasi" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
                        <br>
                        <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                        <input type="file" name="skl_prestasi" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
                        <br>
                        <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
                    </div>

                    <script>
                    // Fungsi untuk mempreview gambar yang diunggah
                    function previewImage(event, previewId, deleteButtonId) {
                        var input = event.target;
                        var reader = new FileReader();
                        
                        reader.onload = function() {
                            var preview = document.getElementById(previewId);
                            preview.src = reader.result;
                            preview.style.display = 'block'; // Tampilkan gambar preview
                            
                            var deleteButton = document.getElementById(deleteButtonId);
                            deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                        };
                        
                        reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
                    }

                    // Fungsi untuk menghapus gambar dan reset input
                    function deleteImage(inputId, previewId, deleteButtonId) {
                        var input = document.getElementById(inputId);
                        var preview = document.getElementById(previewId);
                        var deleteButton = document.getElementById(deleteButtonId);
                        
                        input.value = ''; // Reset input file
                        preview.src = ''; // Reset preview image
                        preview.style.display = 'none'; // Sembunyikan preview
                        deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
                    }
                    </script>
                    </div>
                    </div>
                </div>
            </div>

             <!-- Pop-up Syarat dan Ketentuan -->
             <div id="termsPopup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                <div style="position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; width: 80%; max-width: 600px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="text-align: center;">Syarat dan Ketentuan PPDB</h3>
                    
                    <!-- Syarat dan ketentuan dalam kolom bergulir -->
                    <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                        <p>1. Calon peserta didik harus memenuhi semua persyaratan yang ditetapkan oleh sekolah.</p>
                        <p>2. Informasi yang diberikan harus benar dan sesuai dengan data asli yang dimiliki oleh calon peserta didik.</p>
                        <p>3. Kelalaian atau kesalahan dalam pengisian data dapat mengakibatkan penolakan atau pembatalan pendaftaran.</p>
                        <p>4. Semua dokumen yang diunggah harus dalam format yang sesuai (PDF, JPG, atau PNG) dan jelas.</p>
                        <p>5. Jarak antara rumah dan sekolah akan dihitung berdasarkan data yang diberikan dan dapat mempengaruhi penerimaan.</p>
                        <p>6. Dengan menyetujui, calon peserta didik atau wali murid menyatakan bahwa mereka bertanggung jawab penuh atas informasi yang diberikan.</p>
                    </div>
                    
                    <!-- Checkbox dan teks persetujuan -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <input type="checkbox" id="agreeCheckbox">
                        <label for="agreeCheckbox">Saya setuju dengan syarat dan ketentuan yang ada</label>
                    </div>
                    
                    <!-- Tombol tutup -->
                    <button onclick="hideTermsPopup()" style="margin-top: 15px; padding: 10px; width: 100%;">Tutup</button>
                </div>
            </div>
            
            <script>
                function hideTermsPopup() {
                    document.getElementById("termsPopup").style.display = "none";
                }
            </script>
           
<!-- Checkbox Setuju -->
<div style="display: flex; align-items: center;">
    <div style="margin-right: 10px;">
        <div class="checkbox-container"></div>
        <input type="checkbox" id="terms" name="terms" required onchange="toggleSubmitButton()">
        <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
    </div>
</div>

<!-- Tombol Daftar -->
<div style="margin-top: 10px;">
    <button id="submit-btn" type="submit" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
</div>

<!-- Script untuk menonaktifkan tombol sebelum checkbox dicentang -->
<script>
    function toggleSubmitButton() {
        const checkbox = document.getElementById('terms');
        const submitButton = document.getElementById('submit-btn');
        submitButton.disabled = !checkbox.checked;
    }
</script>

             </div>
            

            <!-- Bagian khusus untuk jalur Afirmasi -->
            <div id="afirmasi-section" class="additional-section">
                <h3>Data Tambahan Jalur Afirmasi</h3>
                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 350px; font-size: 20px; margin-bottom: 5px"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px; margin-bottom: 5px"><br>
                            </div>
                            <div>
                                <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px; margin-bottom: 5px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                            </div>
                        </div><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Tempat Lahir:</label>
                                <select id="tempat_lahir" name="tempat_lahir" required style="width: 150px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                            <div>
                                <label>Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" required style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
            
            
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text" name="kecamatan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Provinsi:</label>
                                <input type="text" name="provinsi" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>

                        <label>Telepon:</label>
                        <input type="text" name="telepon" maxlength="14" required style="width: 150px; margin-bottom: 5px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                        <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px; margin-bottom: 5px;"><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text" name="kecamatan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Provinsi:</label>
                                <input type="text" name="provinsi" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px; margin-bottom: 5px;"><br>
                    </div>
            
                    <script>
                        // Fungsi untuk memperbarui kota di jalur afirmasi
                        function updateCitiesAfirmasi() {
                            const countrySelect = document.getElementById("country-afirmasi");
                            const citySelect = document.getElementById("city-afirmasi");
                    
                            // Menghapus opsi kota yang ada
                            citySelect.innerHTML = "";
                    
                            // Mendapatkan negara yang dipilih
                            const selectedCountry = countrySelect.value;
                    
                            // Menambahkan opsi kota yang sesuai dengan negara yang dipilih
                            if (selectedCountry) {
                                const cities = countryCityData[selectedCountry];
                                cities.forEach(city => {
                                    const option = document.createElement("option");
                                    option.value = city;
                                    option.text = city;
                                    citySelect.add(option);
                                });
                            }
                        }
                    </script>                                        
            
                                <!-- Bagian Unggahan -->
                    <div style="margin-top: 20px;">
                        <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                        <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
                        <br>
                        <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                        <input type="file" name="kk_afirmasi" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
                        <br>
                        <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                        <input type="file" name="skl_afirmasi" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
                        <br>
                        <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Indonesia Pintar (KIP) (PDF/JPG/PNG):</label>
                        <input type="file" name="kip_afirmasi" accept="image/*" onchange="previewImage(event, 'kipPreview', 'kipDelete')" id="kipInput">
                        <br>
                        <img id="kipPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kipDelete" style="display:none;" onclick="deleteImage('kipInput', 'kipPreview', 'kipDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Surat Keterangan Tidak Mampu (PDF/JPG/PNG):</label>
                        <input type="file" name="sktm_afirmasi" accept="image/*" onchange="previewImage(event, 'sktmPreview', 'sktmDelete')" id="sktmInput">
                        <br>
                        <img id="sktmPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sktmDelete" style="display:none;" onclick="deleteImage('sktmInput', 'sktmPreview', 'sktmDelete')">Hapus Gambar</button>
                    </div>

                    <script>
                        // Fungsi untuk mempreview gambar yang diunggah
                        function previewImage(event, previewId, deleteButtonId) {
                            var input = event.target;
                            var reader = new FileReader();

                            reader.onload = function() {
                                var preview = document.getElementById(previewId);
                                preview.src = reader.result;
                                preview.style.display = 'block'; // Tampilkan gambar preview

                                var deleteButton = document.getElementById(deleteButtonId);
                                deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                            };

                            reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
                        }

                        // Fungsi untuk menghapus gambar dan reset input
                        function deleteImage(inputId, previewId, deleteButtonId) {
                            var input = document.getElementById(inputId);
                            var preview = document.getElementById(previewId);
                            var deleteButton = document.getElementById(deleteButtonId);

                            input.value = ''; // Reset input file
                            preview.src = ''; // Reset preview image
                            preview.style.display = 'none'; // Sembunyikan preview
                            deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
                        }
                    </script>

        </div>

         <!-- Pop-up Syarat dan Ketentuan -->
         <div id="termsPopup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
            <div style="position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; width: 80%; max-width: 600px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h3 style="text-align: center;">Syarat dan Ketentuan PPDB</h3>
                
                <!-- Syarat dan ketentuan dalam kolom bergulir -->
                <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                    <p>1. Calon peserta didik harus memenuhi semua persyaratan yang ditetapkan oleh sekolah.</p>
                    <p>2. Informasi yang diberikan harus benar dan sesuai dengan data asli yang dimiliki oleh calon peserta didik.</p>
                    <p>3. Kelalaian atau kesalahan dalam pengisian data dapat mengakibatkan penolakan atau pembatalan pendaftaran.</p>
                    <p>4. Semua dokumen yang diunggah harus dalam format yang sesuai (PDF, JPG, atau PNG) dan jelas.</p>
                    <p>5. Jarak antara rumah dan sekolah akan dihitung berdasarkan data yang diberikan dan dapat mempengaruhi penerimaan.</p>
                    <p>6. Dengan menyetujui, calon peserta didik atau wali murid menyatakan bahwa mereka bertanggung jawab penuh atas informasi yang diberikan.</p>
                </div>
                
                <!-- Checkbox dan teks persetujuan -->
                <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <input type="checkbox" id="agreeCheckbox">
                    <label for="agreeCheckbox">Saya setuju dengan syarat dan ketentuan yang ada</label>
                </div>
                
                <!-- Tombol tutup -->
                <button onclick="hideTermsPopup()" style="margin-top: 15px; padding: 10px; width: 100%;">Tutup</button>
            </div>
        </div>
        
        <script>
            function hideTermsPopup() {
                document.getElementById("termsPopup").style.display = "none";
            }
        </script>
       

        <!-- Checkbox Setuju -->
<div style="display: flex; align-items: center;">
    <div style="margin-right: 10px;">
        <div class="checkbox-container"></div>
        <input type="checkbox" id="terms" name="terms" required onchange="toggleButton()">
        <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
    </div>
</div>

<!-- Tombol Daftar -->
<div style="margin-top: 10px;">
    <button id="submitButton" type="submit" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
</div>

<script>
function toggleButton() {
    const checkbox = document.getElementById('terms');
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = !checkbox.checked; // Tombol akan aktif jika checkbox dicentang
}
</script>
            </div>

              <!-- Bagian khusus untuk jalur Perpindahan Orang Tua -->
              <div id="perpindahan-section" class="additional-section">
                <h3>Data Tambahan Jalur Perpindahan Orang Tua</h3>

                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 350px; font-size: 20px; margin-bottom: 5px"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px; margin-bottom: 5px"><br>
                            </div>
                            <div>
                                <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px; margin-bottom: 5px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                            </div>
                        </div><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Tempat Lahir:</label>
                                <select id="tempat_lahir" name="tempat_lahir" required style="width: 150px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                            <div>
                                <label>Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" required style="width: 150px; margin-bottom: 5px;"><br>
                    
                            </div>
                        </div><br>
            
            
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px; margin-bottom: 5px;"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 30px; margin-bottom: 5px;">
                            </div>
                        </div><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>Kelurahan:</label>
                                <input type="text" name="kelurahan" maxlength="50" style="width: 150px; margin-bottom: 5px;"><br>
                             </div>
                            <div style="margin-right: 10px;">
                                <label>Kecamatan:</label>
                                <input type="text