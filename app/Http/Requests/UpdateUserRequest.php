<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change based on your authorization logic
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'string|min:8',
            'category' => 'string',
            'role_id' => 'integer|exists:roles,id',
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
