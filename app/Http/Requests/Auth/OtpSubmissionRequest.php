<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class OtpSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'otp' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'otp.required' => 'OTP is required',
            'otp.numeric' => 'OTP must be numeric',
        ];
    }
}
