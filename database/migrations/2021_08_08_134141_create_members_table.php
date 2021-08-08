<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_category_id')->nullable()->constrained('member_category')->onUpdate('cascade')->onDelete('set null');
            $table->string('slug')->unique();
            $table->string('first_name'); 
            $table->string('last_name');  
            $table->string('middle_name')->nullable();
            $table->date('birth_date'); 
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
        Schema::dropIfExists('members');
    }
}
