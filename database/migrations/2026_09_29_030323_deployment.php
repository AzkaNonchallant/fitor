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
        Schema::create("", function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('server_id')->constrained('servers')->onDelete('cascade');
            $table->string('commit_sha', 40);
            $table->string('branch');
            $table->enum('status', ['pending', 'deploying', 'success', 'failed', 'rolled_back'])->default('pending');
            $table->dateTime('deployed_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
