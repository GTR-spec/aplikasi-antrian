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
}