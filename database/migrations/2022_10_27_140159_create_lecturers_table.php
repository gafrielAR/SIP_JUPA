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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->unique();
            $table->string('position')->nullable();
            $table->string('years_of_service');
            $table->string('months_of_service');
            $table->foreignId('study_program_id')->constrained('study_programs')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive']);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['men', 'women']);
            $table->enum('citizenship', ['WNI', 'WNA']);
            $table->foreignId('religion_id')->constrained('religions')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('blood_type', ['A', 'O', 'B', 'AB']);
            $table->text('address');
            $table->string('phone');
            $table->foreignId('direct_supervisor_id')->nullable()->constrained('lecturers');
            $table->string('nidn_nupn')->nullable();
            $table->string('karis_karsus')->nullable();
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
        Schema::dropIfExists('lecturers');
    }
};
