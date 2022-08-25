<?php

namespace App\Http\Controllers;

use App\Nice;
use App\Post;

use Illuminate\Http\Request;

class NicesController extends Controller
{
    public function nice(Request $request, Post $post)
    {
        $nice = new Nice;
        $nice->user_id = auth()->user()->id;
        $nice->post_id = $post->id;
        $nice->save();

        return redirect('/');
    }

    public function unnice(Request $request, Post $post)
    {
        $nice = Nice::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();
        $nice->delete();

        return redirect('/');
    }
}
