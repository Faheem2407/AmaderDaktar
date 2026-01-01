<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctor_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);

            $table->time('start_time');
            $table->time('end_time');

            $table->integer('duration')->default(30);
            $table->integer('interval')->default(10);
            $table->integer('max_patients')->default(1);

            $table->decimal('appointment_fee', 10, 2)->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['user_id', 'day', 'start_time', 'end_time'], 'unique_doctor_availability');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_availabilities');
    }
};
