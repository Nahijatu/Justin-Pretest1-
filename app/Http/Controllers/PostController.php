<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User; // Pastikan Anda mengimpor model User
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Buat post baru dengan data yang valid
        Post::create($validatedData);

        // Redirect ke halaman daftar posts
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementasikan logika untuk menampilkan post tertentu jika diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
   // Method edit
   public function edit($id)
   {
       $post = Post::find($id);
       return view('posts.edit', compact('post'));
   }

   // Method update
   public function update(Request $request, $id)
   {
       $post = Post::find($id);
       $post->update($request->all());
       return redirect()->route('posts.index');
   }

   // Method destroy
   public function destroy($id)
   {
       $post = Post::find($id);
       $post->delete();
       return redirect()->route('posts.index');
   }
}
