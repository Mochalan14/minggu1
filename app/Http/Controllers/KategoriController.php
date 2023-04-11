<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function create(){
        return view('post.kategori.create');
    }
}
