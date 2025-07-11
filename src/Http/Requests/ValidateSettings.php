<?php

namespace LaravelEnso\Facebook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettings extends FormRequest
{
    public function rules()
    {
        return [
            'domain_verification' => 'required|boolean',
        ];
    }
}
