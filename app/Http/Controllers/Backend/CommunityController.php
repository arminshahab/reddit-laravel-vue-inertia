<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::where('user_id', auth()->id())->paginate(5)->through(fn ($community) => [
            'id' => $community->id,
            'name' => $community->name,
            'slug' => $community->slug
        ]);
        return Inertia::render('Communities/Index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Communities/Create');
    }


    public function store(CommunityStoreRequest $request)
    {
        Community::create($request->validated() + ['user_id' => auth()->id()]);

        return to_route('communities.index')->with('message', 'Community Created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Community $community)
    {
        $this->authorize('update', $community);
        return Inertia::render('Communities/Edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        $this->authorize('update', $community);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|min:5'
        ]);

        $community->update($validated);
        return to_route('communities.index')->with('message', 'Community Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $this->authorize('delete', $community);

        $community->delete();
        return to_route('communities.index')->with('message', 'Community deleted Successfully');
    }
}
