<?php

use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddTrackerLanguageForeignKeyToSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        Schema::table('tracker_sessions', function (Blueprint $table) {
            $table->foreign('language_id')
                    ->references('id')
                    ->on('tracker_languages')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->builder->table('tracker_sessions', function ($table) {
            $table->dropForeign(['language_id']);
        });
    }
}
