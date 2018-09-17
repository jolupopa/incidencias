<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller {
	public function store(Request $request) {

		$this->validate($request, ['name' => 'required']);
		Level::create($request->all());

		return back();

	}

	public function update(Request $request) {

		$this->validate($request, ['name' => 'required']);
		$level = Level::findOrFail($request->level_id);
		$level->update($request->all());
		return back();
	}

	public function destroy(Request $request) {
		$level = Level::findOrFail($request->level_id);
		$level->delete();
		return back();
	}

}
