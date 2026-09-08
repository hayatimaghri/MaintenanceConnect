<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'localisation' => ['required', 'string', 'max:255'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'budget' => ['required', 'numeric', 'min:0'],
            'priorite' => ['required', 'string', 'in:Faible,Moyenne,Haute'],
            'statut' => ['string'],
            'date_publication' => ['required', 'date'],
            'date_limite' => ['required', 'date'],
        ];
    }
}