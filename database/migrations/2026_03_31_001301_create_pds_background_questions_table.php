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
        Schema::create('pds_background_questions', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('personal_information')->onDelete('cascade');

            // Question 34
            $table->string('q34a')->nullable(); // Yes/No
            $table->text('q34a_details')->nullable();
            $table->string('q34b')->nullable(); // Yes/No
            $table->text('q34b_details')->nullable();

            // Question 35
            $table->string('q35a')->nullable(); // Yes/No
            $table->text('q35a_details')->nullable();
            $table->string('q35b')->nullable(); // Yes/No
            $table->text('q35b_details')->nullable();
            $table->string('q35b_date_filed')->nullable();
            $table->text('q35b_status')->nullable();

            // Question 36
            $table->string('q36')->nullable(); // Yes/No
            $table->text('q36_details')->nullable();

            // Question 37
            $table->string('q37')->nullable(); // Yes/No
            $table->text('q37_details')->nullable();

            // Question 38
            $table->string('q38a')->nullable(); // Yes/No
            $table->text('q38a_details')->nullable();
            $table->string('q38b')->nullable(); // Yes/No
            $table->text('q38b_details')->nullable();

            // Question 39
            $table->string('q39')->nullable(); // Yes/No
            $table->text('q39_details')->nullable();

            // Question 40
            $table->string('q40a')->nullable(); // Yes/No
            $table->text('q40a_details')->nullable();
            $table->string('q40b')->nullable(); // Yes/No
            $table->text('q40b_details')->nullable();
            $table->string('q40c')->nullable(); // Yes/No
            $table->text('q40c_details')->nullable();

            // Question 41 - References (3 rows)
            $table->string('ref1_name')->nullable();
            $table->string('ref1_address')->nullable();
            $table->string('ref1_contact')->nullable();
            $table->string('ref2_name')->nullable();
            $table->string('ref2_address')->nullable();
            $table->string('ref2_contact')->nullable();
            $table->string('ref3_name')->nullable();
            $table->string('ref3_address')->nullable();
            $table->string('ref3_contact')->nullable();

            // Question 42 - Declaration
            $table->string('govt_issued_id')->nullable();
            $table->string('id_no')->nullable();
            $table->string('id_date_issued')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pds_background_questions');
    }
};
