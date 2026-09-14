<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('missions')
            ->where('statut', 'like', 'Affect%')
            ->update(['statut' => 'Affectée']);

        DB::table('missions')
            ->where('statut', 'like', 'Termin%')
            ->update(['statut' => 'Terminée']);

        DB::table('missions')
            ->where('statut', 'ouverte')
            ->update(['statut' => 'Publiée']);

        DB::table('offres')
            ->where('statut', 'en_attente')
            ->update(['statut' => 'en attente']);

        DB::table('offres')
            ->where('statut', 'acceptée')
            ->update(['statut' => 'acceptee']);

        DB::table('offres')
            ->where('statut', 'refusée')
            ->update(['statut' => 'refusee']);
    }

    public function down(): void
    {
        // The previous status values were corrupted during import.
    }
};
