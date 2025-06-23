<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);  array of obj
        // dd($this);
        return [
            "coursename" => $this->name, 
            'full_desc' => $this->description,
            // 'user' => $this->user_id,
            'creator' => [
                'name' => $this->user->name,
                'email' => $this->user->email 
            ]
            // users 
            
        ];
    }
}
