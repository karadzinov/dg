<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

class StoreBirthdayInvitationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;  // Change based on your authorization logic
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'date' => 'required',
            'years' => 'required',
            'group_photo' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Accept file upload
                    if (request()->hasFile('group_photo')) {
                        $file = request()->file('group_photo');
                        $ext = strtolower($file->getClientOriginalExtension());
                        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                        if (!in_array($ext, $allowed)) {
                            $fail('The group photo must be a jpg, jpeg, png, or gif image.');
                        }
                        return;
                    }
                    // Accept OpenAI upload tokens (e.g., "upload://...")
                    if (is_string($value) && Str::startsWith($value, 'upload://')) {
                        return;
                    }
                    // Otherwise fail
                    $fail('group_photo must be an image file upload or a valid upload:// token.');
                }
            ],
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
