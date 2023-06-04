<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

class PostController extends Controller {
    public function getPosts()
    {
        $url = 'http://localhost:3005/post/';
        $data = file_get_contents($url);
        $posts = json_decode($data);

        return view('posts', compact('posts'));
    }

    public function deletePost($id)
    {
        $url = 'http://localhost:3005/post/delete/' . $id;
        $options = [
            'http' => [
                'method' => 'DELETE',
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression du post.');
        }
        return redirect()->back()->with('success', 'Le post a été supprimé avec succès.');
    }
}
