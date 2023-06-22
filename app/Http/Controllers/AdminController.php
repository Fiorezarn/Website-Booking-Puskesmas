<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        
        $data = [
            'totalUser' => $totalUser,
        ];
        
        return view('admin.dashboard', $data);
    }
}

