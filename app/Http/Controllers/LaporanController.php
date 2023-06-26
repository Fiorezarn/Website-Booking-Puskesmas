<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    protected $Antrean;

    public function __construct(Antrean $Antrean)
    {
        $this->Antrean = $Antrean;
    }

    public function generatePDF(Request $request)
    {
        $category = $request->query('category');
        $query = Antrean::orderBy('created_at', 'desc');
        $totalpasien = User::count();

        if ($category && $category !== 'all') {
            $query->where('kategori', $category);
        }

        $pasien = $query->take(7)->get();
        $pdf = PDF::loadView('outputlaporan', compact('pasien'));
        return $pdf->download('laporan.pdf');
    }
    
    public function laporan()
    {
        $data = [
            'pasien' => $this->Antrean->get(),
            'totalpasien'=> $this->Antrean->count(),
            'antreanPoliUmum' => $this->Antrean->where('kategori', 'Poli Umum')->get(),
            'antreanPoliGigi' => $this->Antrean->where('kategori', 'Poli Gigi')->get(),
            'antreanPoliTHT' => $this->Antrean->where('kategori', 'Poli THT')->get(),
        ];
        return view('admin.laporan', $data);
    }
}
