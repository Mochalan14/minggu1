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

    public function edit($id){
        $post = Post::where('id',$id)->get();

        return view('post.edit',compact(['post']));
    }

    public function update(Request $request){
        $post = Post::find($request->id);

        $post->Judul = $request->judul;
        $post->Deskripsi = $request->deskripsi;
        $post->save();

        return redirect()->route('post.index');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index');
    }
}
