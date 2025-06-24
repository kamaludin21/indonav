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
    Schema::create('tickets', function (Blueprint $table) {
      $table->id();
      $table->string('token')->unique();
      $table->string('full_name');
      $table->string('email');
      $table->string('phone_number');
      $table->string('company')->nullable();
      $table->string('ticket_category');
      $table->string('subject');
      $table->text('description');
      $table->string('attachment')->nullable();
      $table->enum('status', [
        'queue',
        'process',
        'done'
      ])->default('queue');
      $table->text("note")->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tickets');
  }
};
