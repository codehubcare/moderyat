<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\PostStoreRequest;
use Codehubcare\Moderyat\Http\Requests\PostUpdateRequest;
use Codehubcare\Moderyat\Models\Post;
use Codehubcare\Moderyat\Models\PostCategory;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('category')
            ->latest()
            ->simplePaginate();

        return view('moderyat::posts.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $categories = $this->getPostCategories();

        return view('moderyat::posts.create', compact('post', 'categories'));
    }

    public function store(PostStoreRequest $request)
    {
        Post::create(
            [
                'title' => $request->get('title'),
                'slug' => Str::slug($request->get('title')),
                'category_id' => $request->get('category_id'),
                'content' => $request->get('content'),
                'is_published' => $request->get('is_published'),
                'user_id' => auth()->user()->id,
                'meta_title' => $request->get('meta_title'),
                'meta_description' => $request->get('meta_description'),
                'meta_keywords' => $request->get('meta_keywords'),
            ]
        );

        return redirect()->route('posts.index')->withSuccess('New post added.');
    }

    public function show(Post $post)
    {
        return view('moderyat::posts.show', compact('user'));
    }

    public function edit(Post $post)
    {
        $categories = $this->getPostCategories();

        return view('moderyat::posts.edit', compact('post', 'categories'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update(
            [
                'title' => $request->get('title'),
                'slug' => Str::slug($request->get('title')),
                'category_id' => $request->get('category_id'),
                'content' => $request->get('content'),
                'is_published' => $request->get('is_published'),
                'meta_title' => $request->get('meta_title'),
                'meta_description' => $request->get('meta_description'),
                'meta_keywords' => $request->get('meta_keywords'),
            ]
        );

        return redirect()
            ->route('posts.index')
            ->withSuccess('Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        // TODO: Remove file or image if any

        return redirect()
            ->route('posts.index')
            ->withSuccess('Post deleted.');
    }

    private function getPostCategories()
    {
        return PostCategory::published()->get();
    }
}
