<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Antrean;

class AntreanuserController extends Controller
{
    protected $Antrean;

    public function __construct(Antrean $Antrean)
    {
        $this->Antrean = $Antrean;
    }

    public function userantreanall()
    {
        $data = [
            'pasien' => $this->Antrean->select('id', 'status')->get(),
        ];

        // dd($data);
        return view('antrean', $data);
    }

    public function userantrean()
    {
        $userId = auth()->user()->id;
        $data = [
            'pasien' => $this->Antrean->where('user_id',  $userId)->get(),
        ];
        // dd($data);
        return view('antrean', $data);
    }

    public function showForm()
    {
        return view('ambilantrean');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namapasien' => 'required',
            'usia' => 'required|numeric',
            'jeniskelamin' => 'required',
            'kategori' => 'required',
            'nik' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);
    
        $userId = Auth::id(); 
    
        $data = [
            'namapasien' => $validatedData['namapasien'],
            'usia' => $validatedData['usia'],
            'jeniskelamin' => $validatedData['jeniskelamin'],
            'kategori' => $validatedData['kategori'],
            'nik' => $validatedData['nik'],
            'nohp' => $validatedData['nohp'],
            'alamat' => $validatedData['alamat'],
            'user_id' => $userId,
        ];
        
        $Data['user_id'] = auth()->user()->id; 
        $this->Antrean->addData($data);
    
        return redirect()->back()->with('success', 'Antrean berhasil diambil!');
    }
}
