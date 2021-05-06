<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_habits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('habit_id');
            $table->integer('taken_time');
            $table->text('description')->nullable($value=true);
            $table->date('done_at');
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
        Schema::dropIfExists('daily_habits');
    }
}
