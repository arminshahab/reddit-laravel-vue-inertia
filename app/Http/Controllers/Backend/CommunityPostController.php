<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommunityPostController extends Controller
{
  
  public function create(Community $community)
  {

    return Inertia('Communities/Posts/Create', compact('community'));
  }


  public function store(PostStoreRequest $requst,  Community $community)
  {

    $community->posts()->create($requst->validated() + ['user_id' => auth()->id()]);

    return Redirect::route('frontend.communities.show', $community->slug);
  }


  public function edit(Community $community, Post $post)
  {

    $this->authorize('update', $post);

    return Inertia::render('Communities/Posts/Edit', compact('community', 'post'));
  }


  public function update(PostStoreRequest $request, Community $community, Post $post)
  {
    $this->authorize('update', $post);

    $post->update($request->validated());
    return Redirect::route('frontend.communities.posts.show', [$community->slug, $post->slug]);
  }


  public function destroy(Community $community, Post $post)
  {
    $this->authorize('delete', $post);

    $post->delete();
    return Redirect::route('frontend.communities.show', $community->slug);
  }
}
