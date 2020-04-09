<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
          'acount_name' => $this->acount_name,
          'nick_name' => $this->nick_name,
          'profile_image' => $this->profile_image,
          'email' => $this->email,
          'password' => $this->password,
          'date' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
