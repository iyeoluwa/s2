<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPodcastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcasts', function (Blueprint $table) {
           $table->dateTime('converted_for_downloading_at')->nullable();
           $table->dateTime('converted_for_streaming_at')->nullable();
           $table->string('audio_stream')->after('audio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('converted_for_downloading_at');
            $table->dropColumn('converted_for_streaming_at');
            $table->dropColumn('audio_stream');
        });
    }
}
