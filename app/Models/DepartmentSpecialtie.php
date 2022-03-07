<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentSpecialtie extends Model {
	use HasFactory;

	protected $table = 'department_specialties';

	protected $fillable = [
		'id',
		'occupation_id',
		'specialtie_id',
		'department_id',
		'created_at',
		'updated_at',
	];

	public function occupation_id() {
		return $this->hasOne('App\Models\Occupation', 'id', 'occupation_id');
	}

	public function specialtie_id() {
		return $this->hasOne('App\Models\Specialtie', 'id', 'specialtie_id');
	}

	public function department_id() {
		return $this->hasOne('App\Models\Department', 'id', 'department_id');
	}

}
