<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {
	use SoftDeletes;
	protected $fillable = ['name', 'description', 'start'];

	public function categories() {
		return $this->hasMany(Category::class);
	}

	public function levels() {
		return $this->hasMany(Level::class);
	}

	public function users() {
		return $this->belongsToMany(User::class);
	}

	public function getFirstLevelIdAttribute() {

		return $this->levels->first()->id;

	}
}
