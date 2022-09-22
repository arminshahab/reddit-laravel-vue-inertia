<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'username' => $this->user->username,
            'slug' => $this->slug,
            'votes' => $this->votes,
            'url' => $this->url,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'postVotes' => $this->whenLoaded('postVotes'),
            'created_at' => $this->created_at->diffForHumans()

        ];
    }
}
