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
        Schema::create("api_endpoints", function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id")->constrained("projects")->onDelete('cascade');
            $table->integer('status_code');
            $table->integer('response_time');
            $table->boolean('is_up')->default(false);
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
