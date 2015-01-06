<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('quests', function($table)
                       {
                       $table->increments( 'id'  )->unsigned();
                       
                       // info 
                       $table->string ( 'title' );
                       
                       $table->integer( 'owner' )->unsigned;
                       $table->string ( 'owner_name' );
                       $table->string ( 'owner_photo_url')->nullable();
                       
                       $table->string( 'type'  );
                       $table->string( 'range' );
                       $table->string( 'value' );
                       $table->string( 'nvalue');
                       $table->string( 'votes' );
                       
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
        Schema::drop('quests');
	}
}
