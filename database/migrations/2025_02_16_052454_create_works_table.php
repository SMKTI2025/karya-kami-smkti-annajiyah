<?php

use App\Models\RoleUser;
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
        Schema::create('works', function (Blueprint $table) {
                $table->id();

                $table->string('title');
                $table->text('description');
                $table->string('category');
                
                $table->string('image')
                    ->nullable();
                $table->string('source_code')
                    ->nullable();
                $table->string('video')
                    ->nullable();
                $table->string('documentation')
                    ->nullable();
                $table->json('meta_tags')
                    ->nullable();
                $table->text('usage_guide')
                    ->nullable();

                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
