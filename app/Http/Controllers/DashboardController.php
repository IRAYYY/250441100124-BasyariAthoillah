<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = 5;
        $totalAktif = 3;
        $totalCuti = 1;

        return view('dashboard', [
            'totalMahasiswa' => $totalMahasiswa,
            'totalAktif' => $totalAktif,
            'totalCuti' => $totalCuti
        ]);
    }
}