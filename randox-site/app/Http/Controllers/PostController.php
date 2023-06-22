<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    function getPosts() {
        $posts = Post::paginate(15);

        return view('posts', compact('posts'));
    }

    public function show(Request $request, $slug){
        $url = 'http://localhost:3005/post/'. $slug;
        $data = file_get_contents($url);
        $post = json_decode($data);
    }

    public function newPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'image' => 'required',
            'short_desc' => 'required',
            'post_content' => 'required',
        ]);

        if($validated){

            $slug = preg_replace('/\s+/', '-', $request->title);

            $result = $request->image->storeOnCloudinary();
            $user = $request->user();
            $post = new Post();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $result->getSecurePath();
            $post->short_desc = $request->short_desc;
            $post->content = $request->post_content;
            $post->author = $user->name;
            $post->save();

            return redirect('posts')->with('success', 'Article enregistré !');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'Le post a été supprimé avec succès.');
    }

    public function editPost(Request $request, $slug ){

        $post = Post::where('slug', $slug)->first();
        return view("editPost", compact("post"));
    }


    public function updatePost(Request $request, $slug){
        $validated = $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required|max:150',
            'image' => 'required',
            'short_desc' => 'required',
            'post_content' => 'required',
        ]);

        if($validated) {
            $result = $request->image->storeOnCloudinary();

            $user = $request->user();
            $post = Post::where('slug', $slug)->first();
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->image = $result->getSecurePath();
            $post->short_desc = $request->short_desc;
            $post->content = $request->post_content;
            $post->author = $user->name;
            $post->save();
            return redirect('posts')->with('success', 'Article modifié !');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
}
