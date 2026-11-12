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
}