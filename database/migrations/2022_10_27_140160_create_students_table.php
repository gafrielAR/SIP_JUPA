<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nrp')->unique();
            $table->string('name');
            $table->foreignId('study_program_id')->constrained('study_programs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('semester');
            $table->string('parallel');
            $table->foreignId('guardian_lecturer_id')->constrained('lecturers')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive']);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->date('date_of_entry');
            $table->enum('gender', ['men', 'women']);
            $table->enum('citizenship', ['WNI', 'WNA']);
            $table->foreignId('religion_id')->constrained('religions')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('blood_type', ['A', 'O', 'B', 'AB']);
            $table->text('address');
            $table->string('phone');
            $table->date('graduate_date')->nullable();
            $table->foreignId('acceptance_path_id')->constrained('acceptance_paths')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
