<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('brand_name',256)->unique();
            $table->char('trade_id',10)->unique();
            $table->char('national_number',10)->unique();
            $table->string('city',1000);
            $table->string('address',5000);
            $table->char('phone_number',12);
            $table->char('post_code',10);
            $table->string('email',320)->unique();
            $table->unsignedBigInteger('status')->default(0);
            $table->BigInteger('code')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
