<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Antrean;

class AdminController extends Controller
{
    protected $Antrean;

    public function __construct(Antrean $Antrean)
    {
        $this->Antrean = $Antrean;
    }
    public function index()
    {
        $totalantrean = Antrean::count();
        
        $data = [
            'totalantrean' => $totalantrean,
            'pasienumum'=> $this->Antrean->where('kategori', 'Poli Umum')->count(),
            'pasiengigi'=> $this->Antrean->where('kategori', 'Poli Gigi')->count(),
            'pasientht'=> $this->Antrean->where('kategori', 'Poli THT')->count(),
        ];
        
        return view('admin.dashboard', $data);
    }

    public function poliumum()
    {
        $data = [
        'pasien' => $this->Antrean->where('kategori', 'Poli Umum')->get(),
        'totalpasien'=> $this->Antrean->where('kategori', 'Poli Umum')->count(),
        ];
        return view('admin.poliumum', $data);
    }

    public function poligigi()
    {
        $data = [
        'pasien' => $this->Antrean->where('kategori', 'Poli Gigi')->get(),
        'totalpasien'=> $this->Antrean->where('kategori', 'Poli Gigi')->count(),
        ];
        return view('admin.poligigi', $data);
    }

    public function politht()
    {
        $data = [
        'pasien' => $this->Antrean->where('kategori', 'Poli THT')->get(),
        'totalpasien'=> $this->Antrean->where('kategori', 'Poli THT')->count(),
        ];
        return view('admin.politht', $data);
    }
}

