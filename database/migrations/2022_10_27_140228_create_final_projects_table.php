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
        Schema::create('final_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_mentor')->constrained('lecturers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('second_mentor')->nullable()->constrained('lecturers');
            $table->text('title');
            $table->foreignId('lab_id')->nullable()->constrained('labs');
            $table->date('proposal_date');
            $table->date('proposal_revision_date')->nullable();
            $table->date('final_project_date');
            $table->enum('final_project_status', ['LULUS', 'LULUS DENGAN REVISI', 'GAGAL']);
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
        Schema::dropIfExists('final_projects');
    }
};
