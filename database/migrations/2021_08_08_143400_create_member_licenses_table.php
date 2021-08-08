<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pma_number'); 
            $table->string('prc_number'); 
            $table->string('field_of_practice'); 
            $table->date('expiration_date'); 
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
        Schema::dropIfExists('member_licenses');
    }
}
