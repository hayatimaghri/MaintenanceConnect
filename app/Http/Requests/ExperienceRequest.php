<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'poste' => ['required', 'string', 'max:255'],
            'entreprise' => ['required', 'string', 'max:255'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
        ];
    }
}