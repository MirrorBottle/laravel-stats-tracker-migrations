<?php

use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddTrackerRefererColumnToLog extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_log';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->integer('referer_id')->unsigned()->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->builder->table(
            $this->table,
            function ($table) {
                $table->dropColumn('referer_id');
            }
        );
    }
}
