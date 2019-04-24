<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{

    public function index(){

        // $posts = Post::latest()->paginate(3);
        $posts = Post::latest()->paginate(env('PER_PAGE'));
        // dd($posts);
        return view('post.index',compact('posts'));
    }

    public function create(){

        $categories = Category::all();

        return view('post.create',compact('categories'));
    }

    public function store(){
        $this->validate(request(),[
            'title' => 'required',
            'content' => 'required|min:10'
        ]);
        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'slug' => str_slug(request('title')),
            'category_id' => request('category_id')
        ]);

        // return redirect('/post/create');
        // return redirect()->route('post.index')->with('success','Data berhasil ditambahkan');
        return redirect()->route('post.index')->withSuccess('Data berhasil ditambahkan');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        // $post =Post::find($id);

        return view('post.edit',compact('post','categories'));
    }

    public function update(Post $post){
        // $post = Post::find($id);
        $post->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'content' =>request('content')
            
        ]);

        return redirect()->route('post.index')->withInfo('Data berhasil dirubah');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index')->withDanger('Data berhasil dihapus');
    }
}
