<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWebsiteContentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'summary' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'required|exists',
        ];
    }
}
