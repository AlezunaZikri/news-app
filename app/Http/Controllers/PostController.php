<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
     $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:700',
            'content' => 'required|string',
        ]);
     
       // Upload gambar
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/post', $imageName);
    } else {
        $imageName = null; // Atau Anda bisa memberikan nilai default
    }


    // Simpan data ke database
    Post::create([
        'image' => 'post/' . $imageName,  // Menyimpan path relatif
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
    ]);
        //         //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //get post by ID
         $post = Post::findOrFail($id);


         //render view with post
         return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
        {
            // Validasi data
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:500',
                'content' => 'required|string',
            ]);
       
            // Temukan post berdasarkan ID
            $post = Post::findOrFail($id);
       
            // Periksa jika ada file gambar yang diunggah
            if ($request->hasFile('image')) {
                // Upload gambar baru
                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->storeAs('public/post', $imageName);
       
                // Hapus gambar lama
                Storage::delete('public/post/' . $post->image);
       
                // Perbarui data post dengan gambar baru
                $post->update([
                    'image' => 'post/' . $imageName,
                    'title' => $request->title,
                    'description' => $request->description,
                    'content' => $request->content
                ]);
            } else {
                // Perbarui data post tanpa mengubah gambar
                $post->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'content' => $request->content
                ]);
            }
       
            // Redirect ke halaman index
            return redirect()->route('post.index');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get post by ID
        $post = Post::findOrFail($id);


        //delete image
        Storage::delete('public/post/'. $post->image);


        //delete post
        $post->delete();


        //redirect to index
        return redirect()->route('post.index');
    }

}
