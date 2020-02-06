<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string path
 * @property string name
 */
class StoreUserFileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'path' => ['required', 'image', 'max:5120'],
            'comment' => ['required', 'string'],
        ];
    }
}
