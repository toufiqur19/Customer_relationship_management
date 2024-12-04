<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $blogs = Post::all();
        return view("blog.index", compact("blogs"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("blog.create", compact("categories"));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "title"=> "required",
            "name"=> "required",
            "description"=> "required",
            "published_at"=> "required|date",
            "category"=> "required",
            "tags"=> "required",
            "image"=> "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if($request->has('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $path = 'uploads/posts';
            $file->move($path, $imageName);
        }

        $user = Auth::user()->id;
        Post::create([
            "title"=> $request->title,
            "name"=> $request->name,
            "description"=> $request->description,
            "published_at"=> $request->published_at,
            "category"=> $request->category,
            "tags"=> $request->tags,
            "image"=> $imageName,
            "user_id"=> $user,
        ]);
        return redirect()->route("blogs.index")->with("success", "Blog created successfully");
    }

    public function show(Post $blog)
    {
        return view("blog.show", compact("blog"));
    }

    public function edit(Post $blog)
    {
        $categories = Category::all();
        return view("blog.edit", compact("blog","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $blogs = Post::find($id);
        $validate = $request->validate([
            "title"=> "required",
            "name"=> "required",
            "description"=> "required",
            "published_at"=> "required|date",
            "category"=> "required",
            "tags"=> "required",
            "image"=> "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        if($request->has('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $path = 'uploads/posts';
            $file->move($path, $imageName);
            $image_path = public_path('uploads/posts/'.$blogs->image);
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            $blogs->image = $imageName;
        }

        $user = Auth::user()->id;
        $blogs->update([
            "title"=> $request->title,
            "name"=> $request->name,
            "description"=> $request->description,
            "published_at"=> $request->published_at,
            "category"=> $request->category,
            "tags"=> $request->tags,
            "user_id"=> $user,
        ]);
        return redirect()->route("blogs.index")->with("success", "Blog updated successfully");

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $image_path = public_path('uploads/posts/'.$post->image);
        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $post->delete();
        return redirect()->route("blogs.index")->with("success", "Blog deleted successfully");
    }
}
