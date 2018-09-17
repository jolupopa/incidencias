<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Project::create([
			'name' => 'Proyecto A',
			'description' => 'Proyecto desarrollar un sitio web moderno',
		]);

		Project::create([
			'name' => 'Proyecto B',
			'description' => 'Proyecto desarrollar una aplicacion android',
		]);
	}
}
