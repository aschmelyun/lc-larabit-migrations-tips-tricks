<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analytics', function (Blueprint $table) {
            $table->string('country')->after('ip')->nullable();
            $table->string('ip', 45)->change();
            $table->renameColumn('ip', 'ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analytics', function (Blueprint $table) {
            $table->renameColumn('ip_address', 'ip');
            $table->dropColumn('country');
        });
        Schema::table('analytics', function (Blueprint $table) {
            $table->string('ip')->change();
        });
    }
}
