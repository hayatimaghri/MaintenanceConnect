<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'prix' => ['required', 'numeric', 'min:0'],
            'message' => ['required', 'string'],
            'pre_diagnostic' => ['nullable', 'string'],
            'delai' => ['required', 'integer', 'min:1'],
        ];
    }
}
