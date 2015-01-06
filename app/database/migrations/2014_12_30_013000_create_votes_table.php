<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('votes', function($table)
                {
                $table->increments( 'id'  )->unsigned();
                
                $table->integer( 'owner' )->unsigned;
                $table->integer( 'quest' )->unsigned;
                $table->string ( 'value' );
                
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
		//
        Schema::drop('votes');
	}

}
