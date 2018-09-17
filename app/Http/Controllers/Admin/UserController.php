<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function index() {

		$users = User::where('role', 1)->get(); // solo support role 1
		return view('admin.users.index')->with(compact('users'));
	}

	public function store(Request $request) {

		$rules = [
			'email' => 'required|email|max:255|unique:users',
			'name' => 'required|max:255',
			'password' => 'required|min:6',
		];

		$this->validate($request, $rules);

		$user = new User();
		$user->email = $request->input('email');
		$user->name = $request->input('name');
		$user->password = bcrypt($request->input('password'));
		$user->role = 1;
		$user->save();
		return back()->with('notification', 'Usuario creado satisfactoriamente');
	}

	public function edit($id) {

		$user = User::find($id);
		$projects = Project::all();

		$projects_user = ProjectUser::where('user_id', $user->id)->get();

		return view('admin.users.edit')->with(compact('user', 'projects', 'projects_user'));
	}

	public function update(Request $request, $id) {

		$rules = [
			'name' => 'required|max:255',
			'password2' => 'nullable|min:6',
		];

		$this->validate($request, $rules);

		$user = User::find($id);

		$user->name = $request->input('name');
		$password = $request->input('password2');

		//dd($password);

		if ($password) {
			$user->password = bcrypt($password);
		}

		$user->save();

		return back()->with('notification', 'Usuario modificado exitosamente');
	}

	public function delete($id) {

		$user = User::find($id);

		$user->delete();

		return back()->with('notification', 'El usuario se ha dado de baja correctamente');

	}
}
