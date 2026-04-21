<?php

namespace LaravelEnso\Facebook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettings extends FormRequest
{
    public function rules()
    {
        return [
            'verification_code' => 'nullable|string',
            'page_id' => 'nullable|string',
            'domain_verification' => 'required|boolean',
        ];
    }
}
