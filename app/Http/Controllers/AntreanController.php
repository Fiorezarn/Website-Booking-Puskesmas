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
            'status' => 'nullable',
        ], [
            'id.unique' => 'ID Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        $this->antrean->addData($data);
        return redirect()->route('antrean')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
    // public function update($id)
    // {
    //     Request()->validate([
    //         'status' => 'required',
    //     ],[
    //         'status.required' => 'Status wajib diisi !!',
    //     ]);
        
    //     $data = [
    //         'status' => Request('status')
    //     ];
    //     $this->antrean->editData($id, $data);
    //     return redirect()->route('dashboard')->with('pesan','Data Berhasil Di Update !!');
    // }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "status" => "required|in:Diterima,Mengantri,Selesai,Cancelled",
        ]);

        $pasien = Antrean::find($request->id);
        $pasien->status = $request->status;
        $pasien->save();

        return back()->with("pesan", "Status berhasil diperbarui");

    }
    
    public function showupdate()
    {
        return view('update');
    }

//     public function update(Request $request, Antrean $antrean)
// {
//     $validated = $request->validate([
//         "status" => "required|in:Diterima,Mengantri,Selesai,Cancelled",
//     ]);
    
//     $antrean->update($validated);
//     return back()->with("success", "Status berhasil diperbarui");
// }

}
