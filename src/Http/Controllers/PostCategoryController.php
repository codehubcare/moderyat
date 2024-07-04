<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\PostCategoryStoreRequest;
use Codehubcare\Moderyat\Http\Requests\PostCategoryUpdateRequest;
use Codehubcare\Moderyat\Models\PostCategory;

class PostCategoryController extends Controller
{
    public function index(Request $request)
    {
        $postCategories = PostCategory::latest()
            ->main()
            ->simplePaginate();

        return view('moderyat::posts.categories.index', compact('postCategories'));
    }

    public function create()
    {
        $postCategory = new PostCategory();
        $mainCategories = PostCategory::main()->get();

        return view('moderyat::posts.categories.create', compact('postCategory', 'mainCategories'));
    }

    public function store(PostCategoryStoreRequest $request)
    {
        PostCategory::create(
            $request->validated()
                +
                [
                    'slug' => Str::slug($request->title),
                    'user_id' => $request->user()->id
                ]
        );

        return redirect()->route('post-categories.index')->withSuccess('New post category added.');
    }

    public function show(PostCategory $postCategory)
    {
        return view('moderyat::posts.categories.show', compact('postCategory'));
    }

    public function edit(PostCategory $postCategory)
    {
        $mainCategories = PostCategory::main()
            ->where('id', '!=', $postCategory->id)
            ->get();

        return view('moderyat::posts.categories.edit', compact('postCategory', 'mainCategories'));
    }

    public function update(PostCategoryUpdateRequest $request, PostCategory $postCategory)
    {
        $postCategory->update(
            $request->validated() + [
                'slug' => Str::slug($request->title),
            ]
        );

        return redirect()->route('post-categories.index')->withSuccess('Post category updated.');
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        return redirect()->route('post-categories.index')->withSuccess('Post category deleted.');
    }
}
