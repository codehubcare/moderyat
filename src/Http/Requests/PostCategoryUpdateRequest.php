<?php

namespace Codehubcare\Moderyat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'parent_id' => 'required',
            'is_published' => 'required',
        ];
    }
}
