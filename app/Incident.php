<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model {

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function project() {
		return $this->belongsTo(Project::class);
	}

	public function level() {
		return $this->belongsTo(Level::class);
	}

	public function support() {
		return $this->belongsTo(User::class, 'support_id');
	}

	public function client() {
		return $this->belongsTo(User::class, 'client_id');
	}

	public function messages() {
		return $this->hasMany(Message::class);
	}

	public function getSeverityFullAttribute() {

		switch ($this->severity) {
		case 'M':
			return 'Menor';
		case 'N':
			return 'Normal';
		default:
			return 'Alta';
		}

	}

	public function getTitleShortAttribute() {

		return mb_strimwidth($this->title, 0, 10, '...');

	}

	public function getCategoryNameAttribute() {

		if ($this->category) {
			return $this->category->name;
		}

		return 'General';

	}

	public function getSupportNameAttribute() {

		if ($this->support) {
			return $this->support->name;
		}

		return 'Sin asignar';

	}

	public function getStateAttribute() {

		if ($this->active == 0) {
			return 'Resuelto';
		}

		if ($this->support_id) {
			return 'Asignado';
		}

		return 'Pendiente';

	}
}
