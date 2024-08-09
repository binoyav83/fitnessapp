<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
 
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('steps', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('stepsCount');
        //     $table->datetime('start_time');
        //     $table->datetime('end_time');
        //     $table->integer('user_id');
        //     $table->timestamps();
        // });
        $database = DB::connection('mongodb')->getMongoDB();

        // Create 'steps' collection if it does not exist
        $collection = $database->selectCollection('steps');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('steps');
        $database = DB::connection('mongodb')->getMongoDB();

        // Drop 'steps' collection if it exists
        $database->dropCollection('steps');
    }
};
