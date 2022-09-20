<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostVote;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    public function upvote(Post $post)
    {
        $is_voted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();

        if (!is_null($is_voted)) {
            if ($is_voted->vote == -1) {
                $is_voted->update(['vote' => 1]);
                $post->increment('votes', 2);
                return redirect()->back();
            } elseif ($is_voted->vote == 1) {
                return redirect()->back();
            }
        } else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => 1
            ]);

            $post->increment('votes', 1);
            return redirect()->back();
        }
    }

    public function downvote(Post $post)
    {
        $is_voted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();

        if (!is_null($is_voted)) {
            if ($is_voted->vote == 1) {
                $is_voted->update(['vote' => -1]);
                $post->decrement('votes', 2);
                return redirect()->back();
            } elseif ($is_voted->vote == -1) {
                return redirect()->back();
            }
        } else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => -1
            ]);

            $post->decrement('votes', 1);
            return redirect()->back();
        }
    }
}
