<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;


class PostController extends Controller
{
    protected $user;
    protected $post;

    public function __construct(User $user, post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function index()
    {
        // if(!$user =$this->user->find($userId)){
        //     return redirect()-> back();
        // }


        $posts = $this ->post->all();

        return view('post.index', compact('posts'));
    }

    public function show($userId)
    {
        if(!$user =$this->user->find($userId))
            return redirect()->back();

        $posts = $user->posts()->get();

        return view('post.show',compact('user','posts'));
    }
}
