<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //
    public function index()
    {
        $posts = Post::latest()->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month,count(*) published')
            ->groupBy('year', 'month')
            ->get()
            ->toArray();


        return view('posts.index',compact('posts', 'archives'));
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
         auth()->user()->publish(new Post(request(['title','body'])));

           return redirect('/');
    }


    public function  show(Post $post)
    {
        return view('posts.show-single-post', compact('post'));
    }
}

// 1:  Post::create(request(['title', 'body','user_id']));

/*2:Post::create([
'title'  => request('title'),
            'body'    => request('body'),
            'user_id' =>auth()->id()
        ]);
*/