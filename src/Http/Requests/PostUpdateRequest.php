<?php

namespace Codehubcare\Moderyat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'category_id' => 'required',
            'content' => 'required',
            'is_published' => 'required',
            'meta_title' => 'nullable|max:100',
            'meta_description' => 'nullable|max:300',
            'meta_keywords' => 'nullable|max:300',
        ];
    }
}
