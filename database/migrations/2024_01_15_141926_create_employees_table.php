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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->virtualAs('concat(first_name, \' \', last_name)');
            $table->string('image');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('employee_number');
            $table->string('employee_role');
            $table->string('employee_status');
            $table->string('department');
            $table->string('sex');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
