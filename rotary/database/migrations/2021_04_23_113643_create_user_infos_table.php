<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('phone_number');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('ward_id');
            $table->unsignedBigInteger('company_id');


            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')    
                    ->onDelete('cascade');
            
            $table->foreign('district_id')
                   ->references('id')
                   ->on('districts')
                   ->onDelete('cascade'); 

            // $table->foreign('district_id')
            //         ->references('id')
            //         ->on('districts')    
            //         ->onDelete('cascade');

            $table->foreign('municipality_id')
                    ->references('id')
                    ->on('municipalities')    
                    ->onDelete('cascade');
            $table->foreign('ward_id')
                    ->references('id')
                    ->on('wards')    
                    ->onDelete('cascade');
            $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')    
                    ->onDelete('cascade');

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
        Schema::dropIfExists('user_infos');
    }
}
