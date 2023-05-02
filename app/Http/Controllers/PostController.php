<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidationRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $posts = Post::all();
        $kategori = Category::all();
        return view('post.index', compact(['posts', 'kategori']));
    }

    public function create()
    {
        $kategori = Category::all();
        return view('post.create', compact(['kategori']));
    }

    public function store(PostValidationRequest $request)
    {
        $data = $request->input();

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $photo_path = $request->file('photo')->storeAs('public/posts', $filename);
        $photo_path = str_replace('public/', '', $photo_path);



        $post = Post::create([
            'Judul' => $data['judul'],
            'Deskripsi' => $data['deskripsi'],
            'id_kategori' => $data['id_kategori'],
            'photo' => $photo_path
        ]);

        Alert::success('Success', 'Post Berhasil Di Tambahkan');

        return redirect()->route('admin.post.index');
        // dd($data);
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->get();

        return view('post.edit', compact(['post']));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $photo_path = $request->file('photo')->storeAs('public/posts', $filename);
            $photo_path = str_replace('public/', '', $photo_path);


            // //delete old image
            Storage::delete('public/' . $post->photo);

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

        return redirect()->route('admin.post.index');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        Storage::delete('public/' . $post->photo);
        $post->delete();

        return redirect()->route('admin.post.index');
    }

    public function category($id)
    {
        $kategoris = Category::with(['fkPost'])->where('id', $id)->get();

        return view('post.category', compact(['kategoris']));
    }
}
