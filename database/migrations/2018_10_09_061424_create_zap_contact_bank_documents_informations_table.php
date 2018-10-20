<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZapContactBankDocumentsInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zap_contact_bank_documents_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')
            ->on('zapcontactbasicinfos')
            ->onDelete('cascade');
            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')
            ->on('zap_contact_bank_informations')
            ->onDelete('cascade');
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
        Schema::dropIfExists('zap_contact_bank_documents_informations');
    }
}
