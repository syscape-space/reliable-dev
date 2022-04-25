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
		'status',
		'parent',
        'image'
	];
	public function main(){
	    return $this->belongsTo(self::class,'parent','id');
    }

	public function parent() {
		return $this->hasOne('App\Models\Department', 'id', 'parent');
	}

	public function children() {
		return $this->hasMAny(Self::class,'parent');
	}
	public function specialties() {
		return $this->hasMany('App\Models\DepartmentSpecialtie', 'department_id', 'id');
	}

}
