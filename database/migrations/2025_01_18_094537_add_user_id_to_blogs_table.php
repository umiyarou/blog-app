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
        Schema::table('blogs', function (Blueprint $table) {
            // user_id カラムがまだ存在しない場合、追加
            if (!Schema::hasColumn('blogs', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable(false);
                // 外部キー制約を追加
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // user_id カラムが存在する場合、外部キー制約を削除してカラムを削除
            if (Schema::hasColumn('blogs', 'user_id')) {
                $table->dropForeign(['user_id']); // 外部キー制約を削除
                $table->dropColumn('user_id'); // user_id カラムを削除
            }
        });
    }
};