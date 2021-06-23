<?php

use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddLanguageIdColumnToSessions extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_sessions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->bigInteger('language_id')->unsigned()->nullable()->index();
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
                $table->dropColumn('language_id');
            }
        );
    }
}
