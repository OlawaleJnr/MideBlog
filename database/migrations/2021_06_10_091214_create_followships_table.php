<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followships', function (Blueprint $table) {
            $table->id();
			//if Ayomide is the user1_id that means Ayomide is following Emmanuel
			$table->unsignedBigInteger('user1_id'); //Ayomide -> when you are following somebody
			$table->unsignedBigInteger('user2_id'); // Emmanuel -> indicates the person your are following
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
        Schema::dropIfExists('followships');
    }
}

