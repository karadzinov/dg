<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'category' => $this->category,
            'role' => optional($this->role)->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
