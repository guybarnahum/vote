<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// .............................................................................
//  users table
//      uid
//      info - email,name,tag_line
//      current session
//      identities - facebook, google
//      statistics: count, timestamps: created_at, updated_at
// .............................................................................

class CreateUsersTbl extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table)
                       {
                       $table->increments( 'id'  )->unsigned();
                       
                       // info
                       $table->string( 'name'     );
                       $table->string( 'email'    )->unique();
                       $table->string( 'tag_line' )->nullable();
                       $table->string( 'photo_url')->nullable();
                       
                       // $table->string( 'login'    );
                       // session?
                       // $table->string( 'session'  )->nullable();
                       // token to remember login that does not expire
                       $table->rememberToken();
                       
                       // identities : native, facebook and google
                       
                       $table->string( 'username' )->unique;
                       $table->string( 'pass'     )->nullable();
                       $table->string( 'password' )->nullable();

                       $table->string( 'fb_id'    )->nullable();
                       $table->string( 'fb_photo' )->nullable();
                       
                       $table->string( 'gl_id'    )->nullable();
                       $table->string( 'gl_photo' )->nullable();
                       
                       // user rank and decorations
                       
                       // access statistics
                       $table->integer( 'use_count' )->nullable()->unsigned();
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
        Schema::drop('users');
    }
}
