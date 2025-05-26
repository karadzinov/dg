<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

/**
 * @property-read mixed $group_photo
 */
class StoreBirthdayInvitationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change as needed
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'date' => 'required|string',
            'years' => 'required|string',
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
                    // Accept OpenAI upload tokens (e.g., "upload://...")
                    if (is_string($value) && Str::startsWith($value, 'upload://')) {
                        return;
                    }
                    // Otherwise fail
                    $fail('group_photo must be an image file upload or a valid upload:// token.');
                }
            ],
            'email' => 'required|email',
            'main_text' => 'required|string',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
