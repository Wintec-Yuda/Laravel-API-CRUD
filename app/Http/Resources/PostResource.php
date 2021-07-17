<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
        $created_at = new Carbon($this->created_at);
        $updated_at = new Carbon($this->updated_at);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $created_at->isoFormat('D MMMM Y HH:MM:SS'),
            'updated_at' => $updated_at->isoFormat('D MMMM Y HH:MM:SS'),
        ];
    }
}
