<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotographerStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            // Add more fields here dynamically from the --fields option
        ];
    }
}
