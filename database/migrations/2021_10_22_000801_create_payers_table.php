<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payers', function (Blueprint $table) {
            $table->id();
            $table->text("ad");
            $table->text("kategori")->default('Sipariş');
            $table->double("borc_miktari");
            $table->integer("odeme_durumu")->default(0);
            $table->text('telefon_no')->nullable();
            $table->integer('bilgilendirme_durumu')->default(0);
            $table->text("odeme_yil")->default("-");
            $table->text("odeme_ay")->default("-");
            $table->text("odeme_gun")->default("-");
            $table->text("description")->nullable();
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
        Schema::dropIfExists('payers');
    }
}
