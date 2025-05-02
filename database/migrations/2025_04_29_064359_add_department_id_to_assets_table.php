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
            $table->integer('department_id')->nullable()->after('model_id');

            // Thêm khóa ngoại thủ công nếu cần, nhưng vì là kiểu int (không unsigned) nên KHÔNG khuyến khích
            // Laravel yêu cầu kiểu của foreign key phải trùng với kiểu của cột tham chiếu
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });
    }
};
