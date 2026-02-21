<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Notifications\AddPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        return view('user.post');
    }

    public function store(Request $request)
    {
        $post_data = $request->validate([
            'title' => ['required'],
            'author' => ['required']
        ]);

        Post::create($post_data);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
        ];
        // event(new PostCreated($data));
        $postData = [
            'message' => "You added a post"
        ];
        $user = auth()->user();
        $user->notify(new AddPost($postData));

        return redirect()->back();
    }
}
