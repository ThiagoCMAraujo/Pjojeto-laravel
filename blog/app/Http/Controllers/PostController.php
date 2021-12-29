<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postsall()
    {
        return view('posts.postsall');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'description' => 'min:30',
        ]);

        // dd(auth()->user()->id);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'description' => $request->description,
        ]);

         $post->save();

        //  $request->user()->posts()->create([
        //      'description' => $request->description,
        //  ]);

        // $request->user()->posts()->create($request->only('description'));

         return back();
    }
}
