<?php namespace Fes\Profile\Updates;

use Schema;
use DbDongle;
use October\Rain\Database\Updates\Migration;

class UpdateTimestampsNullable extends Migration
{
    public function up()
    {
        DbDongle::disableStrictMode();
        DbDongle::convertTimestamps('fes_profile_profiles');
    }

    public function down()
    {
    }
}
