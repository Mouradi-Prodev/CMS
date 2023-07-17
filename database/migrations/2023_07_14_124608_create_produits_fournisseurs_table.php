<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained();
            $table->foreignId('fournisseur_id')->constrained();
            $table->double('prix');
            $table->string('delai_livraison');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits_fournisseurs');
    }
};
