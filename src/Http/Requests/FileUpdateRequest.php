<?php

namespace Codehubcare\Moderyat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileUpdateRequest extends FormRequest
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
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png,gif,webp,bmp,svg,webm,mp3,mp4,m4a|max:100000',
        ];
    }
}
