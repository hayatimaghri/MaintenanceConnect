<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $missions = [
            1 => [
                'titre' => 'Maintenance préventive d’une ligne de production',
                'description' => 'Nous recherchons un technicien pour effectuer la maintenance préventive d’une ligne de production industrielle et contrôler les différents équipements.',
            ],
            2 => [
                'titre' => 'Diagnostic d’une panne électrique industrielle',
                'description' => 'Intervention pour identifier et réparer une panne électrique sur une installation industrielle.',
            ],
            3 => [
                'titre' => 'Maintenance d’un système hydraulique',
                'description' => 'Intervention de maintenance corrective sur un système hydraulique industriel.',
            ],
            4 => [
                'titre' => 'Intervention sur une armoire électrique',
                'description' => 'Contrôle, diagnostic et remise en état d’une armoire électrique industrielle.',
            ],
            5 => [
                'titre' => 'Maintenance d’une machine de production',
                'description' => 'Maintenance préventive et corrective d’une machine utilisée dans une chaîne de production.',
            ],
            6 => [
                'titre' => 'Maintenance préventive d’une machine industrielle',
                'description' => 'Réaliser une maintenance préventive et vérifier l’état général de la machine.',
            ],
        ];

        foreach ($missions as $id => $values) {
            DB::table('missions')->where('id_mission', $id)->update($values);
        }
    }

    public function down(): void
    {
        // The previous values were irreversibly corrupted during import.
    }
};
