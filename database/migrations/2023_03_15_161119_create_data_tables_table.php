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
        Schema::create('data_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("code_filiere")->nullable();
            $table->string("annee_formation")->nullable();
            $table->string("module")->nullable();
            $table->string("Taux_Realisation_P_syn")->nullable();
            $table->string("mh_realisee_globale")->nullable();
            $table->string("groupe")->nullable();
            $table->string("Regional")->nullable();
            $table->string("Seance_EFM")->nullable();
            $table->string("MH_Affectee_Globale_P_SYN")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tables');
    }
};
