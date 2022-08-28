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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                [
                    'firstname' => 'Jānis',
                    'lastname' => 'Bērzs',
                    'email' => 'janis.berzs@example.com'
                ],
                [
                    'firstname' => 'Līga',
                    'lastname' => 'Ozola',
                    'email' => 'liga.ozola@example.com'
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
        Schema::dropIfExists('users');
    }
};
