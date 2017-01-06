<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tests', function (Blueprint $table) {
        //     $table->integer('test_id')->unique();
        //     $table->string('test_name');
        //     $table->string('test_result');
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
