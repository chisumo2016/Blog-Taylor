<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //
    public function index()
    {
        $posts = Post::filter(request(['month', 'year']))->get();


        $archives = Post::archives(); // Fetching archive

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


/*$posts = Post::latest();

  //Code is to mess .To refactor
   if($month = request('month')){
       $posts->whereMonth('created_at', Carbon::parse($month)->month);
      }

    if($year = request('year')){
           $posts->whereYear('created_at', $year);
     }

$posts = $posts->get();*/





