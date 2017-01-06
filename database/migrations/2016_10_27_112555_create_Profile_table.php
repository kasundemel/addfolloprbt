<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('profiles', function (Blueprint $table) {
        //     $table->integer('p_id')->unique();
        //     $table->string('p_name');
        //     $table->string('p_url');
        //     $table->date('created_at');
        //     $table->date('updated_at');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
