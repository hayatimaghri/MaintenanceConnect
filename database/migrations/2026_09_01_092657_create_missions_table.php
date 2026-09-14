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
        Schema::create('missions', function (Blueprint $table) {
            $table->id('id_mission');

            $table->string('localisation');
            $table->string('titre');
            $table->text('description');

            $table->decimal('budget', 10, 2);

            $table->string('priorite');
            $table->string('statut')->default('Publiée');

            $table->dateTime('date_publication');
            $table->dateTime('date_limite');

            $table->foreignId('id_utilisateur')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
