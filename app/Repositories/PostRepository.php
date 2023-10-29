<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->model = new Post;
    }
}