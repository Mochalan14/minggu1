<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $posts = Post::all();
        return view('post.index',compact(['posts']));
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $data = $request->input();

        $post = Post::create([
            'Judul' => $data['judul'],
            'Deskripsi' => $data['deskripsi']
        ]);

        return redirect()->route('post.index');
        // dd($data);
    }
}
