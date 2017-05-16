<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.admin-post.create');
    }


    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'title'=> 'required',
            'body' => 'required'
        ]);
        // Create a new Post using the request data
           Post::create(request(['title', 'body']));
           return redirect('/');
    }


    public function  show(Post $post)
    {
        return view('posts.show-single-post', compact('post'));
    }
}
