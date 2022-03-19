<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\UsersRequest;
use App\Models\User;
use App\Models\UserCommercial;
use App\Models\UserExperience;
use App\Models\UserJob;
use App\Models\UserLicense;
use App\Models\UserQualification;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Users extends Controller {

	public function __construct() {
		$this->middleware('AdminRole:users_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:users_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:users_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:users_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(UsersDataTable $users) {
		$account_type = !empty(request('account_type'))?trans('admin.'.request('account_type')):trans('admin.all');
		return $users->render('admin.users.index', ['title' => trans('admin.users').' / '.trans('admin.'.request('membership_type')).' / '.$account_type]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.users.create', ['title' => trans('admin.create').' / '.trans('admin.'.request('membership_type'))]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(UsersRequest $request) {
		$data                  = $request->except("_token", "_method");
		$data['photo_profile'] = "";
		$data['admin_id']      = admin()->id();
		$data['password']      = bcrypt(request('password'));
		$users                 = User::create($data);
		if (request()->hasFile('photo_profile')) {
			$users->photo_profile = it()->upload('photo_profile', 'users/'.$users->id);
			$users->save();
		}

		return successResponseJson([
			"message" => trans("admin.added"),
			"data"    => $users,
		]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$users              = User::find($id);
		$commercial_records = UserCommercial::where('user_id', $id)->orderBy('id', 'desc');
		$qualifications     = UserQualification::where('user_id', $id)->orderBy('id', 'desc');
		$experiences        = UserExperience::where('user_id', $id)->orderBy('id', 'desc');
		$userlicenses       = UserLicense::where('user_id', $id)->orderBy('id', 'desc');
		$jobs               = UserJob::where('user_id', $id)->orderBy('id', 'desc');
		return is_null($users) || empty($users)?
		backWithError(trans("admin.undefinedRecord"), aurl("users")):
		view('admin.users.show', [
			'title'                    => trans('admin.show').' / '.trans('admin.'.$users->membership_type).' - '.$users->name,
			'users'                    => $users,
			'experiences'              => $experiences->paginate(15),
			'userlicenses'             => $userlicenses->paginate(15),
			'qualifications'           => $qualifications->paginate(15),
			'commercial_records'       => $commercial_records->paginate(15),
			'jobs'                     => $jobs->paginate(15),
			'experiences_count'        => $experiences->count(),
			'userlicenses_count'       => $userlicenses->count(),
			'qualifications_count'     => $qualifications->count(),
			'commercial_records_count' => $commercial_records->count(),
			'jobs_count'               => $jobs->count(),
		]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$users = User::find($id);
		return is_null($users) || empty($users)?
		backWithError(trans("admin.undefinedRecord"), aurl("users")):
		view('admin.users.edit', [
			'title' => trans('admin.edit').' - '.trans('admin.'.$users->membership_type),
			'users' => $users,
		]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * update a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function updateFillableColumns() {
		$fillableCols = [];
		foreach (array_keys((new UsersRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(UsersRequest $request, $id) {
		// Check Record Exists
		$users = User::find($id);
		if (is_null($users) || empty($users)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("users"));
		}
		$data = $this->updateFillableColumns();
		if (!empty(request('password'))) {
			$data['password'] = bcrypt(request('password'));
		}
		$data['admin_id'] = admin()->id();
		if (request()->hasFile('photo_profile')) {
			it()        ->delete($users->photo_profile);
			$data['photo_profile'] = it()->upload('photo_profile', 'users');
		}
		User::where('id', $id)->update($data);

		$users = User::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $users,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$users = User::find($id);
		if (is_null($users) || empty($users)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("users"));
		}
		if (!empty($users->photo_profile)) {
			it()            ->delete($users->photo_profile);}

		it()->delete('user', $id);
		$users->delete();
		return redirectWithSuccess(aurl("users"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$users = User::find($id);
				if (is_null($users) || empty($users)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("users"));
				}
				if (!empty($users->photo_profile)) {
					it()            ->delete($users->photo_profile);
				}
				it()->delete('user', $id);
				$users->delete();
			}
			return redirectWithSuccess(aurl("users"), trans('admin.deleted'));
		} else {
			$users = User::find($data);
			if (is_null($users) || empty($users)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("users"));
			}

			if (!empty($users->photo_profile)) {
				it()            ->delete($users->photo_profile);
			}it()->delete('user', $data);
			$users->delete();
			return redirectWithSuccess(aurl("users"), trans('admin.deleted'));
		}
	}

	public function get_vendor() {
		$users = [];
		if (request()->ajax()) {
			if (request('get_by') == 'city' && request('city_id') > 0) {
				$users = User::where('city_id', request('city_id'))
					->whereIn('id', users_SD(request('department_id')))
					->where('membership_type', '!=', 'user')
					->where('account_status', 'active')	->get(['name  AS text', 'id']);
			} elseif (request('get_by') == 'filter' && !empty(request('search_user'))) {
				$users = User::where(function ($q) {
						$q->where('name', 'LIKE', '%'.request('search_user').'%')
						->orWhere('email', 'LIKE', '%'.request('search_user').'%')
							->orWhere('mobile', 'LIKE', '%'.request('search_user').'%')
						->orWhere('id_number', 'LIKE', '%'.request('search_user').'%');
					})
					->whereIn('id', users_SD(request('department_id')))
					->where('membership_type', '!=', 'user')
					->where('account_status', 'active')
					->get(['name  AS text', 'id']);
			}
		}
		return response(['items' => $users], 200);

	}
	

	public function get_arbitrators() {
		$users = [];
		if (request()->ajax()) {

			$users = User::where(function ($q) {
					if (!empty(request('search_user'))) {
						$q->where('name', 'LIKE', '%'.request('search_user').'%')
						->orWhere('email', 'LIKE', '%'.request('search_user').'%')
							->orWhere('mobile', 'LIKE', '%'.request('search_user').'%')
						->orWhere('id_number', 'LIKE', '%'.request('search_user').'%');
					}
				})
				->whereIn('id', arbitrators_SD(request('department_id')))
				->where('membership_type', '!=', 'user')
				->where('account_status', 'active')
				->get(['name  AS text', 'id']);
		}
		return response(['items' => $users], 200);

	}

	public function get_user_info() {
		if (request()->ajax() && request('user_id') > 0) {
			return successResponseJson([
					'data' => User::find(request('user_id')),
				]);
		} else {
			return successResponseJson([
					'data' => null,
				]);
		}
	}
	public function get_users() {
		$users = [];
		if (request()->ajax()) {

			$users = User::where(function ($q) {
					if (!empty(request('search_user'))) {
						$q->where('name', 'LIKE', '%'.request('search_user').'%')
						->orWhere('email', 'LIKE', '%'.request('search_user').'%')
							->orWhere('mobile', 'LIKE', '%'.request('search_user').'%')
						->orWhere('id_number', 'LIKE', '%'.request('search_user').'%');
					}
				})
				->get(['name  AS text', 'id']);
		}
		return response(['items' => $users], 200);

	}

	public function get_city_id() {
		if (request()->ajax()) {
			if (request("country_id") > 0) {
				$select = request("select") > 0?request("select"):"";
				return \Form::select("city_id", \App\Models\City::where("country_id", request("country_id"))->pluck('city_name_ar', 'id'), $select, ["class" => "form-control select2", "placeholder" => trans("admin.choose"), "id" => "city_id"]);
			}
		} else {
			return "<select class='form-control'></select>";
		}
	}

}