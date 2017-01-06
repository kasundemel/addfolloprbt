<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('campaigns', function (Blueprint $table) {
        //     $table->integer('campaign_id')->unique();
        //     $table->string('campaign_name');
        //     $table->string('campaign_template');
        //     $table->string('fail_url');
        //     $table->string('success_url');
        //     $table->string('parameter');
        //     $table->string('mobile_or_url');
        //     $table->string('urls');
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
