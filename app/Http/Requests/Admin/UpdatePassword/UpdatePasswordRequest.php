<?php

namespace App\Http\Requests\Admin\UpdatePassword;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'old_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->guard('admin')->user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
            'password'          => ['required', 'min:8'],
            'confirm_password'  => 'required|same:password'
        ];
    }
}
