<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->increments('id');
            $table->text('org_name');
            $table->text('org_title');
            $table->text('org_description');
            $table->text('org_image');
            $table->date('org_start');
            $table->date('org_end');                 
            $table->unsignedInteger('login_id')->index();
            
            $table->foreign('login_id')
            ->references('id')->on('login')
            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization');
    }
}
