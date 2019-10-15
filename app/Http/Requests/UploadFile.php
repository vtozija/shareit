<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'share_file' => 'required|file|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'share_file.required' => 'Please select a file to upload.',
            'share_file.file' => 'File was not uploaded succesfully.',
            'share_file.max' => 'Max file size is 10MB.',
        ];
    }
}
