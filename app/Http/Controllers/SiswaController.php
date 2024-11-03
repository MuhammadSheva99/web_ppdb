<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SiswaController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     */
    public function create()
    {
        return view('pendaftaran');
    }

    /**
     * Menyimpan data pendaftaran ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswas',
            'telepon' => 'required|string|max:14',
            'jurusan' => 'required|string|max:100',
            'dokumen' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Simpan dokumen ke direktori penyimpanan 'public/dokumen'
        $dokumenPath = $request->file('dokumen')->store('dokumen', 'public');

        // Simpan data siswa ke database
        Siswa::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'telepon' => $request->input('telepon'),
            'jurusan' => $request->input('jurusan'),
            'dokumen' => $dokumenPath,
        ]);

        return redirect()->route('cek-status')->with('success', 'Pendaftaran berhasil.');
    }

    /**
     * Mengecek status pendaftaran berdasarkan email.
     */
    public function cekStatus(Request $request)
    {
        $siswa = null;

        if ($request->has('email')) {
            // Cari data siswa berdasarkan email
            $siswa = Siswa::where('email', $request->input('email'))->first();

            // Jika data siswa tidak ditemukan
            if (!$siswa) {
                return redirect()->back()->with('error', 'Email tidak ditemukan.');
            }
        }

        return view('cek-status', compact('siswa'));
    }

    /**
     * Menampilkan pengumuman.
     */
    public function pengumuman()
    {
        $pengumuman = [
            ['judul' => 'Pengumuman 1', 'isi' => 'Pendaftaran dibuka hingga 30 September.'],
            ['judul' => 'Pengumuman 2', 'isi' => 'Ujian berlangsung pada 15 Oktober.'],
            ['judul' => 'Pengumuman 3', 'isi' => 'Hasil ujian akan diumumkan pada 1 November.'],
        ];

        return view('pengumuman', compact('pengumuman'));
    }

    /**
     * Menampilkan pratinjau PDF dari data yang diinput.
     */
    public function previewPDF(Request $request)
    {
        // Ambil data dari input
        $data = $request->all();

        // Buat dan tampilkan tampilan PDF
        $pdf = PDF::loadView('preview-pdf', compact('data'));

        return $pdf->stream('pratinjau-pendaftaran.pdf');
    }
}
