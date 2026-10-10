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
        Schema::create("uptime_events", function (Blueprint $table) {
            $table->id();
            $table->foreignId("server_id")->constrained("servers")->onDelete('cascade');
            $table->dateTime("started_at");
            $table->dateTime("ended_at")->nullable(); 
            $table->string("reason")->nullable();
            $table->timestamp('recorded_at')->useCurrent(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uptime_events');
    }
};
