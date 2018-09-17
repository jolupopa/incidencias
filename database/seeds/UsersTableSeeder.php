<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::create([
			'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('secret'),
			'role' => 0,
			'remember_token' => str_random(10),
		]);

		User::create([
			'name' => 'client',
			'email' => 'client@client.com',
			'password' => bcrypt('secret'),
			'role' => 2,
			'remember_token' => str_random(10),
		]);
	}
}
