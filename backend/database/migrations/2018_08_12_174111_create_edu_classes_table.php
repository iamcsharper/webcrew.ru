<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacher_id');
            $table->string('name'); // Название курса
            $table->integer('price'); // Цена подписки
            $table->integer('max_places'); // Максимальное количество подписок
            $table->float('rating')->nullable(); // Максимальное количество подписок
            $table->timestamp('next_date')->nullable(); // Запланированная дата занятия
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
        Schema::dropIfExists('edu_classes');
    }
}
