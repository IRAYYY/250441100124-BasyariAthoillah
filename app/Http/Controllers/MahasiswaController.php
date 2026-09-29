<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    private function dataMahasiswa()
    {
        return [
            [
                'nim' => '2410010001',
                'nama' => 'Sinta Maharani',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2024',
                'status' => 'aktif',
            ],
            [
                'nim' => '2410010002',
                'nama' => 'Budi Santoso',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2024',
                'status' => 'aktif',
            ],
            [
                'nim' => '2410010003',
                'nama' => 'Rina Wulandari',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2023',
                'status' => 'cuti',
            ],
            [
                'nim' => '2410010004',
                'nama' => 'Ahmad Fauzi',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2023',
                'status' => 'aktif',
            ],
            [
                'nim' => '2410010005',
                'nama' => 'Dewi Lestari',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2022',
                'status' => 'lulus',
            ],
        ];
    }

    public function profil()
    {
        return view('mahasiswa.profil', [
            'nama' => 'Sinta Maharani',
            'nim' => '2410010001',
            'prodi' => 'Sistem Informasi',
            'angkatan' => '2024',
        ]);
    }

    public function index()
    {
        $mahasiswa = $this->dataMahasiswa();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function show($nim)
    {
        $data = $this->dataMahasiswa();
        
        // Mencari mahasiswa berdasarkan NIM
        $mhs = collect($data)->firstWhere('nim', $nim);

        // Jika NIM tidak ditemukan, tampilkan halaman error 404
        if (!$mhs) {
            abort(404);
        }

        return view('mahasiswa.show', compact('mhs'));
    }
}