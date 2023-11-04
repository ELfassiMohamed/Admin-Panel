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
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->string('full_name')->virtualAs('concat(first_name, \' \', last_name)');
            $table->string('image');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('employee_role');
            $table->string('employee_status');
            $table->date('birth_date');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password')->virtualAs('concat(full_name,birth_date)');
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
