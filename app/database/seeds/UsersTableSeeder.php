<?php
    
class UsersTableSeeder extends Seeder {
    
    public function run()
    {
        DB::table('quests')->delete();
        $faker = Faker\Factory::create();
        
        for( $i = 0; $i < 25; $i++ ){
            
            $email      = $faker->unique()->email;
            $username   = $faker->unique()->userName;
            
            $pass  = $email . ':' . $username;
            
            $user = array('name'     => $faker->name,
                          'email'    => $email,
                          'username' => $username,
                          'pass'     => $pass,
                          'password' => Hash::make( $pass ),
                          
                          'use_count'=> 0
                    );
                          
            $this->command->info( print_r( $user, true) );
            User::create( $user );
        }
    }
}
