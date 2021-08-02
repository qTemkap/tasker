<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('priority_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('group_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('executor_id')->constrained('users');
            $table->string('title');
            $table->string('short_description')->nullable()->default('null');
            $table->string('description');
            $table->date('end');
            $table->boolean('close');
            $table->boolean('done');
            $table->text('comment_about_work');
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
        Schema::dropIfExists('tasks');
    }
}
