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
        Schema::create('detail_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flood_id')->constrained('floods');
            $table->foreignId('report_id')->constrained('reports');
            $table->string('level', 25);
            $table->string('priority', 50);
            $table->text('desc');
            $table->text('location');
            $table->string('longtitude', 15);
            $table->string('latitude', 15);
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
        Schema::dropIfExists('detail_reports');
    }
};
