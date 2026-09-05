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
        Schema::create('offres', function (Blueprint $table) {
            $table->id('id_offre');

            $table->decimal('prix', 10, 2);
            $table->text('message');
            $table->integer('delai');

            $table->string('statut')->default('en_attente');
            $table->dateTime('date_offre');
             $table->foreignId('id_mission')
                ->constrained('missions', 'id_mission')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('offres');
    }
};
