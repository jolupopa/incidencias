<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
	public function index() {

		$projects = Project::withTrashed()->get();
		return view('admin.projects.index')->with(compact('projects'));
	}

	public function store(Request $request) {
		$rules = [
			'name' => 'required',
			'description' => '',
			'start' => 'date',
		];

		$this->validate($request, $rules);

		Project::create($request->all());

		return back()->with('notification', 'El proyecto se creo correctamente');

	}

	public function edit($id) {
		$project = Project::find($id);
		$categories = $project->categories;
		$levels = $project->levels;
		return view('admin.projects.edit')->with(compact('project', 'categories', 'levels'));

	}

	public function update(Request $request, $id) {
		$rules = [
			'name' => 'required',
			'description' => '',
			'start' => 'date',
		];

		$this->validate($request, $rules);

		Project::find($id)->update($request->all());

		return back()->with('notification', 'El proyecto se ha actualizo correctamente');

	}

	public function delete($id) {
		Project::find($id)->delete();

		return back()->with('notification', 'El proyecto se ha deshabilitado correctamente');
	}

	public function restore($id) {
		Project::withTrashed()->find($id)->restore();

		return back()->with('notification', 'El proyecto se ha habilitado correctamente');
	}
}
