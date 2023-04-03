<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $nama = User::get();
        // dd($nama);        
        return view('welcome',compact(['nama']));
    }

    public function minggu2(){

        $users = User::get();

        $users14 = User::whereDate('created_at','2023-03-14')->get();
        return view('minggu2',compact(['users','users14']));
    }
    
}
