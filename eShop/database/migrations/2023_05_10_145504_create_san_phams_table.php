<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string("ten_sp", 200)->nullable();
            $table->decimal("gia", 20, 0)->nullable();
            $table->text("mo_ta")->nullable();
            $table->string("cover_img", 500)->nullable();
            $table->unsignedBigInteger("id_nt")->index("idx_san_phams_id_nt")->nullable();
            $table->bigInteger("id_dm")->index("idx_san_phams_id_dm")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_phams');
    }
};
