<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteContentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'url' => $this->url,
            'summary' => $this->summary,
        //    'content' => $this->content
        ];
    }
}
