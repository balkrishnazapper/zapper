<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactBasicInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactbasicinformation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_id')->unique();
            $table->string('title');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('home_phone');
            $table->string('mobile_phone');
            $table->string('secondery_phone')->nullable();
            $table->string('ssn')->unique();
            $table->string('date_of_birth');
            $table->string('drivers_license')->unique();
            $table->string('drivers_license_state')->nullable();
            $table->string('primary_email')->unique();
            $table->string('secondery_email')->nullable();
            $table->string('contact_image')->default('profile.png');
            $table->boolval('status')->default(1);
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('contactbasicinformation');
    }
}
