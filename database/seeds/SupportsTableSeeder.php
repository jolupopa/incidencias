<?php

use app\User;
use Illuminate\Database\Seeder;

class SupportsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::create([
			'name' => 'support1',
			'email' => 'support1@support.com',
			'password' => bcrypt('secret'),
			'role' => 1,
			'remember_token' => str_random(10),
		]);

		User::create([
			'name' => 'support2',
			'email' => 'support2@support.com',
			'password' => bcrypt('secret'),
			'role' => 1,
			'remember_token' => str_random(10),
		]);
	}
}
