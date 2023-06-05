<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function getPosts()
    {
        $url = 'http://localhost:3005/post/';
        $data = file_get_contents($url);
        $posts = json_decode($data);

        return view('posts', compact('posts'));
    }

    public function newPost(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required|max:150',
            'image' => 'required',
            'short_desc' => 'required',
            'content' => 'required',
        ]);

        if($validated){
        $user = $request->user();
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->image = $request->image;
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
}
