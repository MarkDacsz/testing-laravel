<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        if ($post->user_id !== auth()->id()) {
            return redirect('/')->with('error', 'You do not have permission to delete this post.');
        }

        $post->delete();
        return redirect('/')->with('success', 'Post successfully deleted.');
    }

    public function editPost(Request $request, Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        if ($post->user_id !== auth()->id()) {
            return redirect('/')->with('error', 'You do not have permission to edit this post.');
        }

        $incomingFields = $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/')->with('success', 'Post successfully updated.');
    }

    public function createPost (Request $request)
    {
       $incomingFields = $request->validate([
        'title' => ['required'],
        'body' => ['required']
       ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);
        return redirect('/')->with('success', 'New post successfully created.');
    }

    public function showEditForm(Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        if ($post->user_id !== auth()->id()) {
            return redirect('/')->with('error', 'You do not have permission to edit this post.');
        }

        return view('edit-post', ['post' => $post]);
    }
}
