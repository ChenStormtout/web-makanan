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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('order_code')->unique();
        $table->text('address');
        $table->integer('total_price');
        $table->enum('payment_method', ['cod', 'transfer', 'qris'])->default('cod');
        $table->enum('status', ['pending', 'processing', 'done'])->default('pending');
        $table->enum('order_type', ['via_web', 'via_wa'])->default('via_web');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
