<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Antrean extends Model
{
    use HasFactory;

    protected $table = 'antreans';

    public function addData($data)
    {
        return DB::table('antreans')->insert($data);
    }
    public function editData($id, $data)
    {
        return DB::table('antreans')->where('id', $id)->update($data);
    }
}

