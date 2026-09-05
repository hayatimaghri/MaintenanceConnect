<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_mission' => ['required', 'integer', 'exists:missions,id_mission'],
            'prix' => ['required', 'numeric', 'min:0'],
            'message' => ['required', 'string'],
            'pre_diagnostic' => ['nullable', 'string'],
            'delai' => ['required', 'integer', 'min:1'],
            'statut' => ['string'],
            'date_offre' => ['required', 'date'],
        ];
    }
}