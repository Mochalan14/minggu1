<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul' => 'required',
            'deskripsi' => 'required',
            'photo' => 'mimes:png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul harus diisi dong',
            'deskripsi.required' => 'Deskripsi harus diisi dong',
            'photo.mimes' => 'Foto harus berupa format png, jpg',
        ];
    }
}
