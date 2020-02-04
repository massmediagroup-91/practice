<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'image', 'max:5120'],
            'comment' => ['required', 'string'],
        ];
    }
}
