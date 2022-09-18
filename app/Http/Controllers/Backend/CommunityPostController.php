<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommunityPostController extends Controller
{
    public function create( $slug ) {

        $community = Community::where('slug', $slug)->first();
        return Inertia('Communities/Posts/Create', compact('community'));
    }

    public function store(PostStoreRequest $requst,  $slug ) {

      $community = Community::where('slug', $slug)->first();

      $community->posts()->
        create( $requst->validated() + ['user_id' => auth()->id()] );

      return Redirect::route('frontend.communities.show', $community->slug);
    }
}
