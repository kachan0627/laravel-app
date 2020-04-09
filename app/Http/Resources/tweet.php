<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class tweet extends JsonResource
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
          'id'=>$this->id,
          'user_id'=>$this->user_id,
          'text'=>$this->text,
          'reply_tweet_id'=>$this->reply_tweet_id,
          'date' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
