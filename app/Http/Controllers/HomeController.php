<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index(){

        $nama = User::get();
        // dd($nama);        
        return view('welcome',compact(['nama']));
    }

    public function tes(){
        return view('home');
    }
    public function teslogout(){

        Auth::logout();
        return redirect()->route('home');
    }

    public function minggu2(){

        $users = User::get();

        $users14 = User::whereDate('created_at','2023-03-14')->get();
        return view('minggu2',compact(['users','users14']));
    }
}
