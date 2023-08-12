<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentCreateRequest extends FormRequest
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
            'nim' => 'unique:students|max:10|required',
            'nama' => 'required',
            'gender' => 'required',
            'class_id' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'class_id' => 'class'
        ];
    }

    public function messages()
    {
        return [
            'nim.required' => 'Nim is required',
            'nim.max' => 'Nim maximal :max karakter',
        ];
    }
}
