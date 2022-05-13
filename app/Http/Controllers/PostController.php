<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        
        // $currentCategory = Category::firstWhere('slug', request('category'));
        // // dd($currentCategory);
      
        return view('posts.index', [
            'posts' => Posts::latest()->filter(request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show($slug)
    {
        // dd($slug);
        $post = Posts::where('slug', $slug)->first();
        // $comment = Comment::first();
        // dd($comment->post->title);
        // dd($post->comments);

        return view('posts.show', [
            'post' => $post
        ]);
    }

}