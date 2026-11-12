<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::with('kendaraan')->orderBy('created_at', 'desc')->get();
        return view('antrian.index', compact('antrians'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_antrian' => 'required|in:Menunggu,Diproses,Selesai,Batal',
        ]);

        $antrian = Antrian::findOrFail($id);
        $antrian->status_antrian = $request->status_antrian;
        $antrian->save();

        return redirect('/')->with('success', 'Status antrian berhasil diperbarui!');
    }

    // --- FITUR EDIT ---
    public function edit($id)
    {
        $antrian = Antrian::with('kendaraan')->findOrFail($id);
        return view('antrian.edit', compact('antrian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_antrian' => 'required|string|max:20',
            'nomor_polisi' => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string|max:50',
            'nama_pemilik' => 'required|string|max:100',
            'status_antrian' => 'required|in:Menunggu,Diproses,Selesai,Batal',
        ]);

        $antrian = Antrian::findOrFail($id);
        
        // Update data antrian
        $antrian->nomor_antrian = $request->nomor_antrian;
        $antrian->status_antrian = $request->status_antrian;
        $antrian->save();

        // Update data kendaraan terkait (relasi)
        if ($antrian->kendaraan) {
            $antrian->kendaraan->update([
                'nomor_polisi' => $request->nomor_polisi,
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'nama_pemilik' => $request->nama_pemilik,
            ]);
        }

        return redirect('/')->with('success', 'Data antrian berhasil diperbarui!');
    }

    // --- FITUR DELETE ---
    public function destroy($id)
    {
        $antrian = Antrian::findOrFail($id);
        
        // Hapus kendaraan terkait (opsional, jika ingin dihapus bersamaan)
        if ($antrian->kendaraan) {
            $antrian->kendaraan->delete();
        }

        // Hapus data antrian
        $antrian->delete();

        return redirect('/')->with('success', 'Data antrian berhasil dihapus!');
    }
}