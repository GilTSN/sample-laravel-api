<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param PostRepository $postRepository
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(PostRepository $postRepository): \Illuminate\Database\Eloquent\Collection
    {
        return $postRepository->get();
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param StorePostRequest $request
     * @param PostRepository $postRepository
     * @return Post
     */
    public function store(StorePostRequest $request, PostRepository $postRepository): Post
    {
        return $postRepository->create($request->validated());
    }

    /**
     * Display the specified resource.
     * 
     * @param Post $post
     * @return Post
     */
    public function show(Post $post): Post
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param UpdatePostRequest $request
     * @param PostRepository $postRepository
     * @param int $id
     * @return Post
     */
    public function update(UpdatePostRequest $request, PostRepository $postRepository, int $id): Post
    {
        return $postRepository->update('id', $id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param PostRepository $postRepository
     * @param int $id
     * @return bool
     */
    public function destroy(PostRepository $postRepository, int $id): bool
    {
        return $postRepository->delete($id);
    }
}
