<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class handl_admins extends Controller
{
    public function index()
    {
        $admins = User::where('role', 0)->get();
        return view('handl_admins.index', compact('admins'));
    }
}
