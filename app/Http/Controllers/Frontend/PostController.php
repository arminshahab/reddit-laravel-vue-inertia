<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResoucre;
use App\Http\Resources\PostShowResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show(Community $community, $slug)
    {
        $community_post = Post::with(['comments', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->where('slug', $slug)->first();

        $post = new PostShowResource($community_post);

        $posts = PostResoucre::collection($community->posts()->orderBy('votes', 'desc')->take(6)->get());

        $can_update = Auth::check() ? Auth::user()->can('update', $community_post) : false;
        $can_delete = Auth::check() ? Auth::user()->can('delete', $community_post) : false;

        return Inertia('Frontend/Posts/Show', compact(['community', 'post', 'posts', 'can_update', 'can_delete']));
    }
}
