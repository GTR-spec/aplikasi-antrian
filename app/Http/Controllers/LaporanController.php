<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use FPDF;

class LaporanController extends Controller
{
    public function cetakLaporanPDF()
    {
        $antrians = Antrian::with('kendaraan')->get();

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'LAPORAN ANTRIAN KENDARAAN', 0, 1, 'C');
        
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 6, 'Aplikasi Pengelolaan Antrian Kendaraan', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(41, 128, 185);
        $pdf->SetTextColor(255, 255, 255);
        
        $pdf->Cell(10, 8, 'No', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'No Antrian', 1, 0, 'C', true);
        $pdf->Cell(35, 8, 'No Polisi', 1, 0, 'C', true);
        $pdf->Cell(35, 8, 'Jenis', 1, 0, 'C', true);
        $pdf->Cell(50, 8, 'Nama Pemilik', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'Status', 1, 1, 'C', true);

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        
        $no = 1;
        foreach ($antrians as $item) {
            $pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $pdf->Cell(30, 7, $item->nomor_antrian, 1, 0, 'C');
            $pdf->Cell(35, 7, $item->kendaraan->nomor_polisi ?? '-', 1, 0, 'C');
            $pdf->Cell(35, 7, $item->kendaraan->jenis_kendaraan ?? '-', 1, 0, 'L');
            $pdf->Cell(50, 7, $item->kendaraan->nama_pemilik ?? '-', 1, 0, 'L');
            $pdf->Cell(30, 7, $item->status_antrian, 1, 1, 'C');
        }

        return response($pdf->Output('S'), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="laporan-antrian-kendaraan.pdf"',
        ]);
    }
}