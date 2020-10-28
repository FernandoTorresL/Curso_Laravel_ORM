<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id');
            $table->string('name', 30)->nullable();
            $table->date('execution_date')->nullable();
            $table->unsignedTinyInteger('is_active')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            Schema::dropIfExists('projects');
        });
    }
}
