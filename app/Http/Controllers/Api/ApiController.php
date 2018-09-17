<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Level;

class ApiController extends Controller {
	public function byproject($id) {

		//dd('dentro de API function byproject');

		return Level::where('project_id', $id)->get();

	}
}
