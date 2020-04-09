<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class profile extends JsonResource
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
          'user_id'=>$this->user_id,
          'introduction'=>$this->introduction,
          'place'=>$this->place,
          'birthday'=>$this->birthday->format('Y-m-d H:i:s'),
          'date' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
