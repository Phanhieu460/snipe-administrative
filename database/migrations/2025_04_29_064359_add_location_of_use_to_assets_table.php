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
            // Thêm cột department_id kiểu INT (không unsigned)
            $table->string('location_of_use')->nullable()->after('unit');
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn('location_of_use');
        });
    }
};
