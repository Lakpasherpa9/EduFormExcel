<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    public function up()
    {
        Schema::create('excels', function (Blueprint $table) {
            $table->id();
            $table->integer('studentid')->nullable(false)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('faculty',['Science and Technology','Management']);
            $table->enum('program', ['BE Computer', 'BE Civil','BBA','BIT','BCA']);
            $table->enum('semester',['1','2','3','4','5','6','7','8'])->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('excels');
    }
}
