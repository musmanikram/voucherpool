<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVoucherCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_codes', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('fk_specialoffer_id');
            $table->integer('fk_receipent_id');
            $table->string('code',8)->unique();
	        $table->date('expire_date')->nullable();
	        $table->boolean('is_used')->default(0)->comment('0 = not used, 1 = used');
	        $table->dateTime('used_dtm')->nullable();
	        $table->index(['code','fk_receipent_id' ,'is_used']);
	        $table->softDeletes();
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
        Schema::dropIfExists('voucher_codes');
    }
}
