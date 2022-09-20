<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show(Community $community)
    {

        $posts = CommunityPostResource::collection($community
            ->posts()
            ->with(['user', 'postVotes' => function ($query) {
                $query->where('user_id', auth()->id());
            }])->paginate(1));
        return Inertia::render('Frontend/Communities/Show', compact('community', 'posts'));
    }
}
