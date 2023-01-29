<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('courseId')->constrained('Courses');
            $table->integer('maxStrength');
            $table->string('rollNumberPrefix');
            $table->string('location');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('Batches');
    }
}
