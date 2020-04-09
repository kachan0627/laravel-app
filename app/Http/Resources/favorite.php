<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class favorite extends JsonResource
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
          'id' => $this->id,
          'user_id' => $this->user_id,
          'tweet_id' => $this->tweet_id,
          'date' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
