<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model {
	//use SoftDeletes;
	protected $table = 'departments';
	//protected $dates    = ['deleted_at'];
	protected $fillable = [
		'id',
		'department_name_ar',
		'department_name_en',
		'department_desc_ar',
		'department_desc_en',
		'department_status',
		'enable_post',
		'parent',
		'created_at',
		'updated_at',
	];

	public function parent() {
		return $this->hasOne('App\Models\Department', 'id', 'parent');
	}

	public function specialties() {
		return $this->hasMany('App\Models\DepartmentSpecialtie', 'department_id', 'id');
	}

}
