<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product',function(Blueprint $table){
            $table->renameColumn('nameee', 'name');
            $table->dropColumn('fullNameee');
            $table->renameColumn('subDescription', 'mainDescripstion');
            $table->renameColumn('description', 'subdescription');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
