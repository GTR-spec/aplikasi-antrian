<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = ['kendaraan_id', 'nomor_antrian', 'tanggal', 'waktu', 'status_antrian'];

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class);
    }
}