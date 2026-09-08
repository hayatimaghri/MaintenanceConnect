<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompetenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_competence' => [
                'required',
                'integer',
                Rule::exists('competences', 'id_competence'),
                Rule::notIn(
                    auth()->user()
                        ->competences()
                        ->pluck('competences.id_competence')
                        ->all()
                ),
            ],
        ];
    }
}