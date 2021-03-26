<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BirthdayResource extends JsonResource
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
            'type' => 'birthdays'
            'id' => $this->id,
            'attributes' =>{
            'name' => $this->name,
            'email' => $this->email,
            'birthday' => $this->birthday->format('F jS'),
            }
        ];
    }
}
