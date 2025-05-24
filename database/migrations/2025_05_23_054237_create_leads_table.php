<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('message');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('event_name')->nullable();
            $table->string('event_date')->nullable();
            $table->string('event_time')->nullable();
            $table->decimal('event_price', 10, 2)->nullable();
            $table->string('event_location')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('security_nonce', 64)->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
