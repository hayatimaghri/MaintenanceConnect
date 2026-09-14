<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('competences')
            ->where('description', 'like', 'Comp%tence utilis%e pour les interventions de maintenance industrielle.')
            ->update(['description' => 'Compétence utilisée pour les interventions de maintenance industrielle.']);

        $names = [
            2 => 'Électricité industrielle',
            3 => 'Électromécanique',
            7 => 'Mécanique industrielle',
            8 => 'Maintenance préventive',
        ];

        foreach ($names as $id => $name) {
            DB::table('competences')
                ->where('id_competence', $id)
                ->update(['nom' => $name]);
        }
    }

    public function down(): void
    {
        // The previous competence text was corrupted during import.
    }
};
