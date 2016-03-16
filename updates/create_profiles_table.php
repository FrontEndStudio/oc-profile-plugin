<?php namespace Fes\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProfilesTable extends Migration
{

    public function up()
    {
        Schema::create('fes_profile_profiles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('headline')->nullable();
            $table->text('about_me')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fes_profile_profiles');
    }

}
