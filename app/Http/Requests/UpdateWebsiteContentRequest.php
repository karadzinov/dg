<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsiteContentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'summary' => 'sometimes|required',
        ];
    }
}
