<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MesinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode' => 'required|max:255',
            'ip' => 'required|ipv4',
            'lokasi' => 'max:255'
        ];
    }
}
