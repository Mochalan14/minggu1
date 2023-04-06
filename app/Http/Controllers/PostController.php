<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $file = $request->file('photo');
        $filename = time() . '.' .$file->getClientOriginalExtension();

        $photo_path = $request->file('photo')->storeAs('public/posts',$filename);
        $photo_path = str_replace('public/','',$photo_path);

        

        $post = Post::create([
            'Judul' => $data['judul'],
            'Deskripsi' => $data['deskripsi'],
            'photo' => $photo_path
        ]);

        return redirect()->route('post.index');
        // dd($data);
    }

    public function edit($id){
        $post = Post::where('id',$id)->get();

        return view('post.edit',compact(['post']));
    }

    public function update(Request $request,$id){
        $post = Post::find($id);

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $filename = time() . '.' .$file->getClientOriginalExtension();
    
            $photo_path = $request->file('photo')->storeAs('public/posts',$filename);
            $photo_path = str_replace('public/','',$photo_path);
    

            // //delete old image
            Storage::delete('public/'.$post->photo);

            //update post with new image
            $post->update([
                'Judul' => $request->judul,
                'Deskripsi' => $request->judul,
                'photo' => $photo_path
            ]);

        } else {

            //update post without image
            $post->update([
                'Judul'     => $request->judul,
                'Deskripsi'   => $request->deskripsi
            ]);
        }

        // $post->Judul = $request->judul;
        // $post->Deskripsi = $request->deskripsi;
        // $post->save();

        return redirect()->route('post.index');
    }

    public function delete($id){
        $post = Post::find($id);
        Storage::delete('public/'.$post->photo);
        $post->delete();

        return redirect()->route('post.index');
    }
}
