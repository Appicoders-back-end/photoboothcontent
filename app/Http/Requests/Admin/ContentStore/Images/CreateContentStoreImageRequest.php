<?php

namespace App\Http\Requests\Admin\ContentStore\Images;

use Illuminate\Foundation\Http\FormRequest;

class CreateContentStoreImageRequest extends FormRequest
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
            'thumbnail_image' => 'required',
            'attachment' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ];
    }
}
