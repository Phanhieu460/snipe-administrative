<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->integer('specification_id')->nullable()->after('department_id');

            $table->foreign('specification_id')
                  ->references('id')
                  ->on('specifications')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['specification_id']);
            $table->dropColumn('specification_id');
        });
    }
};
