<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostShowResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show(Community $community, $slug)
    {
        $post = new PostShowResource(Post::where('slug', $slug)->first());

        return Inertia('Frontend/Posts/Show', compact(['community', 'post']));
    }
}
