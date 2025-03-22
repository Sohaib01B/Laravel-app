<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('produits', function (Blueprint $table) {
        $table->id();
        $table->string('designation');
        $table->text('description')->nullable();
        $table->integer('quantite');
        $table->decimal('prix', 8, 2);
        $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
        $table->string('image')->nullable(); // Ajout du champ image
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
        Schema::dropIfExists('produits');
    }
}
