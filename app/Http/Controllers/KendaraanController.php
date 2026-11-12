<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Antrian;
use App\Models\User;

class KendaraanController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('kendaraan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nomor_polisi' => 'required|string|max:20|unique:kendaraans',
            'jenis_kendaraan' => 'required|string|max:50',
            'nama_pemilik' => 'required|string|max:100',
        ]);

        $kendaraan = Kendaraan::create([
            'user_id' => $request->user_id,
            'nomor_polisi' => $request->nomor_polisi,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'nama_pemilik' => $request->nama_pemilik,
        ]);

        $count = Antrian::count() + 1;
        $nomorAntrian = 'A-' . str_pad($count, 3, '0', STR_PAD_LEFT);

        Antrian::create([
            'kendaraan_id' => $kendaraan->id,
            'nomor_antrian' => $nomorAntrian,
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),
            'status_antrian' => 'Menunggu',
        ]);

        return redirect('/')->with('success', 'Kendaraan dan antrian berhasil ditambahkan!');
    }
}