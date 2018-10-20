<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZapContactLifeDemandsDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zap_contact_life_demands_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')
            ->on('zapcontactbasicinfos')
            ->onDelete('cascade');
            $table->integer('life_demand_id')->unsigned();
            $table->foreign('life_demand_id')->references('id')
            ->on('zap_contact-life_demands')
            ->onDelete('cascade');
            $table->string('document_type');
            $table->string('docname');
            $table->boolean('status')->default('1');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('zap_contact_life_demands_documents');
    }
}
