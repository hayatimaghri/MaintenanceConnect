<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('missions')
            ->where('statut', 'Affect??e')
            ->update(['statut' => 'Affectée']);

        DB::table('missions')
            ->where('statut', 'Termin??e')
            ->update(['statut' => 'Terminée']);
    }

    public function down(): void
    {
        // The previous status values were corrupted during import.
    }
};
