<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     public function up(): void
    {
        Schema::create('responsable_approvisionnement', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('matricule');
            $table->string('idrole');
            $table->timestamps();
        });
    }

    
    
    public function down(): void
    {
        Schema::dropIfExists('responsable_approvisionnement');
    }
};
