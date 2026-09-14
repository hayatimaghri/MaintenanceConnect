<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $descriptions = [
            'Maintenance pr%ventive et corrective des %quipements industriels. Diagnostic des pannes %lectriques et %caniques.' => 'Maintenance préventive et corrective des équipements industriels. Diagnostic des pannes électriques et mécaniques.',
            'Intervention sur les syst%mes %lectrom%caniques et r%alisation des op%rations de maintenance pr%ventive.' => 'Intervention sur les systèmes électromécaniques et réalisation des opérations de maintenance préventive.',
            'R%alisation des op%rations de maintenance pr%ventive et corrective sur les %quipements industriels.' => 'Réalisation des opérations de maintenance préventive et corrective sur les équipements industriels.',
        ];

        foreach ($descriptions as $pattern => $correct) {
            DB::table('experiences')
                ->where('description', 'like', $pattern)
                ->update(['description' => $correct]);
        }
    }

    public function down(): void
    {
        // The previous descriptions were corrupted during import.
    }
};
