<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostCommentsController extends Controller
{
    public function store(Posts $post)
    {
        // request()->all();
        request()->validate([
            'body' => 'required'
        ]);

        dd($post->comments());

        $comment = $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' =>request('body')
        ]);

        dd($comment);

        return back();
    }
}
