<?php

use App\Models\RoleUser;
use App\Models\User;
use App\Models\Work;
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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(RoleUser::class)
                ->constrained()
                ->onDelete('cascade');

            $table->foreignIdFor(Work::class)
                ->constrained()
                ->onDelete('cascade');

            $table->integer('score')
                ->comment('Nilai karya');

            $table->text('comment')
                ->nullable()
                ->comment('Komentar guru');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
