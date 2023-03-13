<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
          //  $table->date('date_of_birth');
          $table->enum('faculty',['Science and Technology','Management']);
          $table->enum('program', ['BE Computer', 'BE Civil','BBA','BIT','BCA']);
          $table->enum('semester',['1','2','3','4','5','6','7','8'])->nullable(false);  
            $table->string('email')->unique();
            $table->integer('amount');
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
        Schema::dropIfExists('payments');
    }
}
