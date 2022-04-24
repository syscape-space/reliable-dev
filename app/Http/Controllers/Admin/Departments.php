<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentSpecialtie;
use App\Models\Specialtie;
use Illuminate\Http\Request;

class Departments extends Controller {

	public function __construct() {
		$this->middleware('AdminRole:departments_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:departments_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:departments_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:departments_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function get_department() {
		if (request()->ajax()) {
			if (request('department_id') > 0) {
				return response()->json(Department::find(request('department_id')));
			} else {
				return response()->json(['error' => 'department Not Found']);
			}
		}
	}

	public static function department() {
		return Department::where(function ($q) {

			});
	}

	public function check_department() {
		if (request()->ajax()) {
			if (request()->has('department_id') && request('department_id') > 0) {
				$department = Department::find(request('department_id'));
				$status     = !empty($department) && $department->enable_post == 'yes'?true:false;

			} else {
				$status = false;
			}
		} else {
			$status = false;
		}
		return successResponseJson([
				'enable_post' => true,
			]);
	}

	public static function checkInArrayManual($dataArr, $id) {
		$check = false;
		foreach ($dataArr as $data) {
			if ($data->id == $id) {
				return true;
			}
		}
		return $check;
	}

	public static function load_dep($did = null, $attr = []) {
		$departments = self::department()
			->selectRaw(l('department_name').' as '.l('department_name'))
			->selectRaw('id as id')
			->selectRaw('parent as parent')
			->get(['department_name', 'parent', 'id']);
		$final = [];
		foreach ($departments as $dep) {
			$dep_list = [];
			if (count($attr) > 0) {
				if (!empty($attr['icon'])) {
					$dep_list['icon'] = $attr['icon'];
				}
				if (!empty($attr['li_attr'])) {
					$dep_list['li_attr'] = $attr['li_attr'];
				}

				if (!empty($attr['a_attr'])) {
					$dep_list['a_attr'] = $attr['a_attr'];
				}

				if (!empty($attr['children']) && count($attr['children']) > 0) {
					$dep_list['children'] = $attr['children'];
				}
			} else {
				//   $dep_list['types']['types']['file']['icon']['image'] = it()->url(settingComp()->company_icon);
			}

			if ($did !== null && $did == $dep->id) {
				$dep_list['state'] = [
					'opened'   => true,
					'selected' => true,
					//'disabled' => true
				];
			}

			$dep_list['id']     = $dep->id;
			$dep_list['parent'] = self::checkInArrayManual($departments, $dep->parent)?$dep->parent:'#';

			$count_sub = $dep->count_manually > 0?$dep->count_manually:
			Department::where('parent', $dep->id)->count();

			$dep_list['text'] = $dep->{l('department_name')} .'  ('.$count_sub.')';

			array_push($final, $dep_list);
		}

		return json_encode($final, JSON_UNESCAPED_UNICODE);
	}

	/// Load chilled Department by parent //
	public static function getChildren($parent) {
		$dep_list    = [];
		$departments = Department::where('parent', $parent)->get();
		foreach ($departments as $department) {
			$check = Department::where('parent', $department->id)->first();
			if (!empty($check)) {
				self::getChildren($department->id);
				$dep_list[] = $department->id;
			} else {
				$dep_list[] = $department->id;
			}
		}

		return $dep_list;

	}
	/// Load chilled Department by parent //

	/// Load Department to Get Ids //
	public static function load_dep_id($did = null, $attr = []) {

		$departments = self::department()->get(['id']);
		$final       = [];
		foreach ($departments as $dep) {
			array_push($final, $dep->id);
		}
		//dd($final);
		return $final;

	}
	/// Load Department to Get Ids //

	public static function master($dep) {
		$department = self::department()->where('id', $dep)->first();
		$deps       = self::department()->where('id', $department->parent)->first();
		if ($deps->parent !== null) {
			return self::master($deps->id);
		} else {
			return $deps->id;
		}
	}

	public function index(Request $request) {
		$departments=Department::withCount('children')->whereNull('parent')->get();
		if(request('department_id')){
			$departments=Department::whereParent(request('department_id'))->get();
		}
		return view('admin.departments.index', ['title' => trans('admin.departments'),'departments'=>$departments]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$departments = Department::select('id','department_name_ar')->whereNull('parent')->get();
		return view('admin.departments.create', ['title' => trans('admin.add'), 'departments' => $departments]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$request->validate([
			'department_name_ar' => 'required|string',
			'department_name_en' => 'required|string',
			'parent'             => 'sometimes|nullable|integer',
		],[
			'department_name_ar' => trans('admin.department_name_ar'),
			'department_name_en' => trans('admin.department_name_en'),
			'parent'             => trans('admin.parent'),
		]);
			$request->merge([
				'status'=>$request->status?true:false
			]);
			$data = $request->all();
			if($request->hasFile('image'))
			$data['image'] = it()->upload('image','images');
		Department::create($data);
		return redirectWithSuccess(aurl('departments'), trans('admin.added'));
	}

	public function department_specialtie($Department) {
		if (!empty(request('specialtie_id')) && count(request('specialtie_id')) > 0) {
			DepartmentSpecialtie::where('department_id', $Department->id)->delete();
			foreach (request('specialtie_id') as $specialtie_id) {
				$Specialtie = Specialtie::find($specialtie_id);
				if (!empty($Specialtie)) {
					DepartmentSpecialtie::create([
							'occupation_id' => $Specialtie->occupation_id,
							'specialtie_id' => $Specialtie->id,
							'department_id' => $Department->id,
						]);
				}
			}
		}
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function show($id) {

		return redirect(aurl('departments'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Department $department) {

		
		$departments = Department::select('id','department_name_ar')->whereNull('parent')->get();
		return view('admin.departments.edit', ['title' => trans('admin.edit'),
				'departments'                                => $departments,
				'department'                                 => $department,
			]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request,Department $department) {

		$request->validate([
			'department_name_ar' => 'required|string',
			'department_name_en' => 'required|string',
			'parent'             => 'sometimes|nullable|integer',
		],[
			'department_name_ar' => trans('admin.department_name_ar'),
			'department_name_en' => trans('admin.department_name_en'),
			'parent'             => trans('admin.parent'),
		]);

			$request->merge([
				'status'=>$request->status?true:false
			]);
            $data = $request->all();
            if($request->hasFile('image'))
            $data['image'] = it()->upload('image','images');
			$department->update($data);
		return redirectWithSuccess(aurl('departments'), trans('admin.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function DeleteParent($id) {
		$getparent = self::department()->where('parent', $id)->get();
		foreach ($getparent as $parent) {
			$check = Department::find($parent->id);
			if ($check->parent > 0) {
				$check->delete();
			} else {
				$check->delete();
			}
		}
	}

	public function destroy(Department $department) {
		$department->delete();
		return redirectWithSuccess(aurl('departments'), trans('admin.deleted'));
	}
}
