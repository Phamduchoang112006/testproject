<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('type_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->string('image', 255);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->integer('id_type')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('promotion_price')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('unit', 255)->nullable();
            $table->tinyInteger('new')->default(0);
            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('type_products');
        });

        Schema::create('slide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link', 100)->nullable();
            $table->string('image', 100);
            $table->timestamps();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('gender', 10);
            $table->string('email', 50);
            $table->string('address', 100);
            $table->string('phone_number', 20);
            $table->string('note', 200);
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->text('content');
            $table->string('image', 100);
            $table->timestamps();
        });

        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned()->nullable();
            $table->date('date_order')->nullable();
            $table->float('total')->nullable();
            $table->string('payment', 200)->nullable();
            $table->string('note', 500)->nullable();
            $table->timestamps();
        });

        Schema::create('bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bill')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->double('unit_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_detail');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('news');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('slide');
        Schema::dropIfExists('products');
        Schema::dropIfExists('type_products');
    }
};
