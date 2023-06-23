<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrean;

class AntreanController extends Controller
{
    protected $antrean;

    public function __construct(Antrean $antrean)
    {
        $this->antrean = $antrean;
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            'id' => 'nullable|unique:antreans,id|min:1|max:6',
            'namapasien' => 'required|max:100',
            'usia' => 'required',
            'jeniskelamin' => 'required',
            'kategori' => 'required',
            'nik' => 'required|integer',
            'nohp' => 'required|integer',
            'alamat' => 'required',
        ], [
            'id.unique' => 'ID Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        $this->antrean->addData($data);
        return redirect()->route('antrean')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
}
