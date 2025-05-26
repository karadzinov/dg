<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBirthdayInvitationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;  // Change based on your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'date' => 'required',
            'years' => 'required',
            'group_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'email' => 'required',
            'main_text' => 'required',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
