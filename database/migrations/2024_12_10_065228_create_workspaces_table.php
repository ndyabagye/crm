<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('workspaces', static function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('name');

            $table->foreignUlid('user_id')->index()->constrained('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};