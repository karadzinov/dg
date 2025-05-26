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
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'date' => 'required|string',
            'years' => 'required|string',
            'email' => 'required|email',
            'main_text' => 'required|string',
            'group_photo' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Accept file upload
                    if ($this->hasFile('group_photo')) {
                        $file = $this->file('group_photo');
                        $ext = strtolower($file->getClientOriginalExtension());
                        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                        if (!in_array($ext, $allowed)) {
                            $fail('The group photo must be a jpg, jpeg, png, or gif image.');
                        }
                        return;
                    }
                    // Accept a public URL to image
                    if (is_string($value) && filter_var($value, FILTER_VALIDATE_URL)) {
                        // Optionally check for image extension/type
                        $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                        $ext = strtolower(pathinfo(parse_url($value, PHP_URL_PATH), PATHINFO_EXTENSION));
                        if (!in_array($ext, $allowedExt)) {
                            $fail('The group photo URL must be a jpg, jpeg, png, gif, or webp image.');
                        }
                        return;
                    }
                    // Block upload:// or anything else
                    $fail('group_photo must be an image file upload or a public image URL.');
                }
            ],
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
