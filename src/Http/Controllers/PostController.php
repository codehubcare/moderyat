<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::simplePaginate();

        return view('moderyat::posts.index', compact('posts'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        return redirect()->route('posts.index')->withSuccess('New post added.');
    }

    public function show(Post $post)
    {
        return view('moderyat::posts.show', compact('user'));
    }

    public function edit(Post $post)
    {
        return view('moderyat::posts.edit', compact('user'));
    }

    public function update(Request $request, User $post)
    {
        return redirect()->route('posts.index')->withSuccess('Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->withSuccess('Post deleted.');
    }
}
