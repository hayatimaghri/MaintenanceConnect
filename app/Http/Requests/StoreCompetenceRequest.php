<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompetenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_competence' => [
                'required',
                'integer',
                'exists:competences,id_competence',
            ],
        ];
    }
}