<?php

use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class FixQueryArguments extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_query_arguments';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        try {
            Schema::table($this->table, function (Blueprint $table) {
                $table->string('value')->nullable()->change();
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
                    $table->string('value')->change();
                }
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
