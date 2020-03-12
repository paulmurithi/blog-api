<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'user'=> new UserResource($this->user),
            'category_id'=> $this->category_id,
            'title'=> $this->title,
            'body'=> $this->body,
            'image'=> $this->image,
            'published'=> $this->published,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
            'likes'=>$this->likes_count,
            'dislikes'=>$this->dislikes_count,
        ];
    }
}
