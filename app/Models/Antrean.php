<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Antrean extends Model
{
    use HasFactory;

    protected $table = 'antreans';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addData($data)
    {
        $userId = Auth::id(); 
        $data['user_id'] = $userId;
        return DB::table('antreans')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('antreans')->where('id', $id)->update($data);
    }
    
    public function getAllData()
    {
        return DB::table('antreans')->get();
    }

}

