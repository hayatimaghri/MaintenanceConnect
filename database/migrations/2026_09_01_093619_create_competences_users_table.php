<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
    {
        Schema::create('competences_users', function (Blueprint $table) {
            $table->foreignId('id_utilisateur')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('id_competence')
                ->constrained('competences', 'id_competence')
                ->cascadeOnDelete();

            $table->primary([
                'id_utilisateur',
                'id_competence'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences_users');
    }
};
