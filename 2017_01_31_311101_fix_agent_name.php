<?php

use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class FixAgentName extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_agents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        try {
            Schema::table($this->table, function (Blueprint $table) {
                $table->dropUnique('tracker_agents_name_unique');
                $table->string('name')->change();
                $table->unique('id', 'tracker_agents_name_unique');
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        try {
            $this->builder->table(
                $this->table,
                function ($table) {
                    $table->string('name', 255)->change();
                    $table->unique('name');
                }
            );
        } catch (\Exception $e) {
        }
    }
}
