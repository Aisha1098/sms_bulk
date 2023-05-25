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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->boolean('is_individual')->default(true);
            $table->boolean('is_corporate')->default(false);
            $table->boolean('is_enterprise')->default(false);
            $table->boolean('is_monthly_invoice')->default(false);
            $table->string('senderID');
            $table->integer('sms_rate_lim');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
