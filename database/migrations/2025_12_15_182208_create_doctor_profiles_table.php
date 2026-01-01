<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('speciality_id')->constrained()->cascadeOnDelete();
            $table->string('bmdc_no')->nullable();
            $table->string('medical_college')->nullable();
            $table->string('session')->nullable();
            $table->string('post_graduation')->nullable();
            $table->string('photo')->nullable();
            $table->decimal('default_fee', 10, 2)->default(0);
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_profiles');
    }
};
