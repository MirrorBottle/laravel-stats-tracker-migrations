<?php

use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTrackerLanguagesTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_languages';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

                $table->string('preference')->index();
                $table->string('language-range')->index();

                $table->unique(['preference', 'language-range']);

                $table->timestamps();
                $table->index('created_at');
                $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->drop($this->table);
    }
}
