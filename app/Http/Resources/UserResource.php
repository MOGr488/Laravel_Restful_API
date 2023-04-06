<?php

namespace App\Http\Resources;

use App\Http\Resources\LessonResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'Full Name' => $this->name,
            'E-Mail' => $this->email,
            'Lessons' => LessonResource::collection($this->lessons)
        ];
    }
}
