<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZapContactDebitCollectionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zap_contact_debit_collection_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')
            ->on('zapcontactbasicinfos')
            ->onDelete('cascade');
            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')
            ->on('zap_contact_debit_collections')
            ->onDelete('cascade');
            $table->string('installment_amount');
            $table->dateTime('installment_date');
            $table->string('mode_of_payment');
            $table->string('reference_code');
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
        Schema::dropIfExists('zap_contact_debit_collection_logs');
    }
}
