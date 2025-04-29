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
            $table->text('unit')->nullable()->after('department_id');
            
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn('unit');
        });
    }
};
