<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Posts::paginate(50)
        ]);
    }
    public function create()
    {
        // dd(auth()->user()->username);     
        return view('admin.posts.create');
    }

    public function store()
    {
        
        // $attributes = $this->validatePost();
 
        // $attributes = request()->validate([
        //     'title' => 'required',
        //     'thumbnail' => $post->exists ? ['image'] :['required', 'image'], 
        //     'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
        //     'excerpt' => 'required',
        //     'body' => 'required', 
        //     'category_id' => ['required', Rule::exists('categories', 'id')],
        //     'published_at' => 'required'
        // ]);

      
        $post = Posts::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            // 'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        // dd($post);
        $path  = request()->file('thumbnail')->store('public/thumbnails');
        // dd($path);
        $pathModified = explode("/", $path);
        // dd($pathModified);

        if(request()->file('thumbnail') ?? false && $pathModified.length > 1) {
            $post->thumbnail = $pathModified[2];
            $post->save();
        }
        
        return redirect('/admin/posts')->with("success", "Post has been created successfully"); 
    }

    public function edit(Posts $post)
    {
        // dd($post);

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Posts $post)
    {
        $attributes = $this->validatePost($post);
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required', 
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if(request()->file("thumbnail")) {
            // dd("updating thumbnail...");
            $path  = request()->file('thumbnail')->store('public/thumbnails');
            // dd($path);
            $pathModified = explode("/", $path);
            // dd($pathModified);
    
            if (request()->file('thumbnail') ?? false && $pathModified.length > 1){
                // dd("saving new thumbnail...");
                $attributes['thumbnail'] = $pathModified[2];
            }
        }
        
        $post->update($attributes);
        return redirect('/admin/posts')->with('success', 'Post Updated!');
    } 

    public function destroy(Posts $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Posts $post = null): array
    {
        $post ??= new Posts();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] :['required', 'image'], 
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required', 
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        return $attributes;
    }
}