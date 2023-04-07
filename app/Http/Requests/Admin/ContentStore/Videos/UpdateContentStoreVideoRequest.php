<?php

namespace App\Http\Requests\Admin\ContentStore\Videos;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContentStoreVideoRequest extends FormRequest
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
            'name' => 'required|max:191',
            'description' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ];
    }
}
