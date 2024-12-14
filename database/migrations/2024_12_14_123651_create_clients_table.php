<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->comment('Laravel');
            $table->string('website')->comment('https://laravel.com');
            $table->foreignId('workspace_id')
                ->index()
                ->constrained('workspaces')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
