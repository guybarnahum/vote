<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->command->info("call UsersTableSeeder");
        $this->call('UsersTableSeeder');
        $this->command->info("Users table seeded :)");
        
        $this->command->info("call QuestsTableSeeder");
        $this->call('QuestsTableSeeder');
        $this->command->info("Quests table seeded :)");

        $this->command->info("call VotesTableSeeder");
        $this->call('VotesTableSeeder');
        $this->command->info("Votes table seeded :)");
    }
}
