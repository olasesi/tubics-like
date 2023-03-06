<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->integer('active')->default(0);
            $table->integer('active_stage1')->default(0);
            $table->integer('active_stage2')->default(0);
            $table->string('youtube_channel')->nullable();
            $table->string('business_description')->nullable();
            $table->string('business_email')->nullable();  
            $table->string('country')->nullable();  
            $table->string('language')->nullable();
            $table->text('competitive_channel')->nullable();
            $table->text('keyword')->nullable();       //Unique or not?
            $table->string('verification_code')->nullable();
            $table->string('token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
