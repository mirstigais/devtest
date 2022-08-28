<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->float('price');
            $table->timestamps();

        });

        Schema::table('products', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        DB::table('products')->insert(
            array(
                [
                    'name' => 'Televizors',
                    'price' => '200',
                ],
                [
                    'name' => 'Austiņas',
                    'price' => '25',
                ],
                [
                    'name' => 'Zāles pļāvējs',
                    'price' => '400',
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
