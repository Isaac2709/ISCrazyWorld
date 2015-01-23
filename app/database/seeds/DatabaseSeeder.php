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

		$this->call('UserTableSeeder');

		$this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        // DB::table('users')->delete();

        // User::create(array('email' => 'foo@bar.com'));

    	$person = new Person;
		$admin = new Admin;
		$person->name = 'name';
		$person->first_surname = 'first surname';
		$person->second_surname = 'second surname';
		$person->email = 'email@gmail.com';
		$person->phone_number = '4585-4588';

		$person->save();

		$admin->people_id = $person->id;
		$admin->username = 'admin';
		$admin->password = Hash::make('12345');

		$admin->save();
    }

}

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        // DB::table('users')->delete();

        Category::create(array('name' => 'Manual'));
        Category::create(array('name' => 'Noticia'));
        Category::create(array('name' => 'Proyecto'));
    }

}