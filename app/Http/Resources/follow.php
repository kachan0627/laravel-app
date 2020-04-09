<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class follow extends JsonResource
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
          'user_id'=>$this->user_id,
          'follow_id'=>$this->follow_id,
          'date' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
