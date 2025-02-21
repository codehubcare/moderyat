<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\PostStoreRequest;
use Codehubcare\Moderyat\Http\Requests\PostUpdateRequest;
use Codehubcare\Moderyat\Models\Post;
use Codehubcare\Moderyat\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('category')
            ->latest()
            ->when(request('search'), function($query) {
                return $query->where('title', 'like', '%' . request('search') . '%');
            })
            ->when(request('category_id'), function($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->simplePaginate()
            ->appends(request()->all());

        $categories = PostCategory::get();

        return view('moderyat::posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $post = new Post();
        $categories = $this->getPostCategories();

        return view('moderyat::posts.create', compact('post', 'categories'));
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create(
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

        $this->handleFileUploadFor($post);

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

        $this->handleFileUploadFor($post);

        return redirect()
            ->route('posts.index')
            ->withSuccess('Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        $post->deleteFileOf('image');
        $post->deleteFileOf('file');

        return redirect()
            ->route('posts.index')
            ->withSuccess('Post deleted.');
    }

    private function getPostCategories()
    {
        return PostCategory::published()->get();
    }

    private function handleFileUploadFor($post)
    {
        if (request()->hasFile('image')) {
            $post->uploadFile('image', 'images');
        }

        if (request()->hasFile('file')) {
            $post->uploadFile('file', 'files');
        }
    }
}
