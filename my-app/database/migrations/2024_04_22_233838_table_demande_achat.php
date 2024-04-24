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
        Schema::create('demande_achat', function (Blueprint $table) {
            $table->id();
            $table->text('detail');
            $table->string('statut')->default('attente');
            $table->string('idemploye');
            $table->string('idresponsableAchat');
            $table->string('iddirecteur');
            $table->string('idresponsableApprovisionnemnet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_achat');
    }
};
