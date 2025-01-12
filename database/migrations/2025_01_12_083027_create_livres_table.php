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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->notNullable(); // Titre du livre
            $table->text('description')->notNullable(); // Description du livre
            $table->string('cover_image')->notNullable(); // Lien de la couverture
            $table->unsignedInteger('category_id'); // ID de la catégorie
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Relation avec les catégories
            $table->boolean('has_digital_version')->default(false); // Version numérique disponible ou non
            $table->enum('langage', ['Francais', 'Anglais']); // Langue
            $table->integer('nbr_page')->nullable(); // Nombre de pages
            $table->text('bio_author')->nullable(); // Biographie de l'auteur
            $table->string('author')->nullable(); // Nom de l'auteur
            $table->string('url')->nullable(); // Lien du fichier numérique
            $table->decimal('price', 10, 2)->nullable(); // Prix du livre
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
