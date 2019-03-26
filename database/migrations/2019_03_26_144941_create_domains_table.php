<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('customer_id')->nullable();
            $table->integer('registrar_id')->nullable();
            $table->integer('dns_id')->nullable();
            $table->integer('website_id')->nullable();
            $table->integer('mail_id')->nullable();
            $table->text('infosheet')->nullable();
            $table->text('infosheet_name')->nullable();
            $table->text('infosheet_size')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
