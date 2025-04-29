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
            // Thêm cột unit kiểu string (không unsigned)
            $table->date('date_of_movement')->nullable()->after('location_of_use');
            $table->date('date_of_repair')->nullable()->after('date_of_movement');
            $table->date('date_of_disposal')->nullable()->after('date_of_repair');
            
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn('date_of_movement');
            $table->dropColumn('date_of_repair');
            $table->dropColumn('date_of_disposal');
        });
    }
};
