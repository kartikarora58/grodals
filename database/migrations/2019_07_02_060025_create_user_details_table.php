<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('company_name');
            $table->text('address1');
            $table->text('address2');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->integer('category_id');
            $table->integer('others')->nullable();
            $table->integer('pincode');
            $table->string('mobile');
            $table->string('landline');
            $table->string('email')->unique();
            $table->string('logo');
            $table->string('gallery');
            $table->text('s_timing1');
            $table->text('s_timing2');
            $table->text('w_timing1');
            $table->text('w_timing2');
            $table->string('off_days');
            $table->text('about_us');
            $table->string('contact_person');
            $table->string('designation');
            $table->string('website');
            $table->tinyinteger('status');
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
        Schema::dropIfExists('user_details');
    }
}
