<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\UserJobsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\UserJobsRequest;
use App\Models\UserCommercial;
use App\Models\UserExperience;
use App\Models\UserJob;
use App\Models\UserLicense;
use App\Models\UserQualification;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserJobs extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:userjobs_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:userjobs_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:userjobs_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:userjobs_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(UserJobsDataTable $userjobs) {
		return $userjobs->render('admin.userjobs.index', ['title' => trans('admin.userjobs')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.userjobs.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(UserJobsRequest $request) {
		$data     = $request->except("_token", "_method");
		$userjobs = UserJob::create($data);

		if (!empty(request('commercial_records')) && request('commercial_records') > 0) {
			$i = 0;
			foreach (request('commercial_records') as $commercial_records) {
				$UserCommercial = UserCommercial::create([
						'commercial_id'     => request('commercial_id')[$i],
						'commercial_end_at' => request('commercial_end_at')[$i],
						'user_id'           => $userjobs->user_id,
						'user_job_id'       => $userjobs->id,
						'commercial_file'   => it()->upload($commercial_records, 'usercommercials/'.$userjobs->user_id),
						'occupation_id'     => $userjobs->occupation_id,
						'specialtie_id'     => $userjobs->specialtie_id,
						'comment'           => request('commercial_comment')[$i],
					]);
				$i++;
			}
		}

		if (!empty(request('licenses')) && request('licenses') > 0) {
			$i = 0;
			foreach (request('licenses') as $licenses) {
				$UserLicense = UserLicense::create([
						'license_name'   => request('license_name')[$i],
						'license_end_at' => request('license_end_at')[$i],
						'user_id'        => $userjobs->user_id,
						'user_job_id'    => $userjobs->id,
						'license_file'   => it()->upload($licenses, 'userlicenses/'.$userjobs->user_id),
						'occupation_id'  => $userjobs->occupation_id,
						'specialtie_id'  => $userjobs->specialtie_id,
						'comment'        => request('license_comment')[$i],
					]);
			}
		}

		if (!empty(request('qualifications')) && request('qualifications') > 0) {
			$i = 0;
			foreach (request('qualifications') as $qualifications) {
				$UserQualification = UserQualification::create([
						'qualification_name' => request('qualification_name')[$i],
						'user_id'            => $userjobs->user_id,
						'user_job_id'        => $userjobs->id,
						'qualification_file' => it()->upload($qualifications, 'userqualifications/'.$userjobs->user_id),
						'occupation_id'      => $userjobs->occupation_id,
						'specialtie_id'      => $userjobs->specialtie_id,
						'comment'            => request('qualifications_comment')[$i],
					]);
			}
		}

		if (!empty(request('experiences')) && request('experiences') > 0) {
			$i = 0;
			foreach (request('experiences') as $experiences) {
				$UserExperience = UserExperience::create([
						'experience_name' => request('experience_name')[$i],
						'user_id'         => $userjobs->user_id,
						'user_job_id'     => $userjobs->id,
						'experience_file' => it()->upload($experiences, 'userexperiences/'.$userjobs->user_id),
						'occupation_id'   => $userjobs->occupation_id,
						'specialtie_id'   => $userjobs->specialtie_id,
						'comment'         => request('experience_comment')[$i],
					]);
			}
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $userjobs,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$userjobs = UserJob::find($id);
		return is_null($userjobs) || empty($userjobs)?
		backWithError(trans("admin.undefinedRecord"), aurl("userjobs")):
		view('admin.userjobs.show', [
				'title'    => trans('admin.show'),
				'userjobs' => $userjobs,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$userjobs = UserJob::find($id);
		return is_null($userjobs) || empty($userjobs)?
		backWithError(trans("admin.undefinedRecord"), aurl("userjobs")):
		view('admin.userjobs.edit', [
				'title'    => trans('admin.edit'),
				'userjobs' => $userjobs,
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
		foreach (array_keys((new UserJobsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(UserJobsRequest $request, $id) {
		// Check Record Exists
		$userjobs = UserJob::find($id);
		if (is_null($userjobs) || empty($userjobs)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("userjobs"));
		}
		$data = $this->updateFillableColumns();
		UserJob::where('id', $id)->update($data);

		if (!empty(request('commercial_records')) && request('commercial_records') > 0) {
			$i = 0;
			foreach (request('commercial_records') as $commercial_records) {
				$UserCommercial = UserCommercial::create([
						'commercial_id'     => request('commercial_id')[$i],
						'commercial_end_at' => request('commercial_end_at')[$i],
						'user_id'           => $userjobs->user_id,
						'user_job_id'       => $userjobs->id,
						'commercial_file'   => it()->upload($commercial_records, 'usercommercials/'.$userjobs->user_id),
						'occupation_id'     => $userjobs->occupation_id,
						'specialtie_id'     => $userjobs->specialtie_id,
						'comment'           => request('commercial_comment')[$i],
					]);
				$i++;
			}
		}

		if (!empty(request('licenses')) && request('licenses') > 0) {
			$i = 0;
			foreach (request('licenses') as $licenses) {
				$UserLicense = UserLicense::create([
						'license_name'   => request('license_name')[$i],
						'license_end_at' => request('license_end_at')[$i],
						'user_id'        => $userjobs->user_id,
						'user_job_id'    => $userjobs->id,
						'license_file'   => it()->upload($licenses, 'userlicenses/'.$userjobs->user_id),
						'occupation_id'  => $userjobs->occupation_id,
						'specialtie_id'  => $userjobs->specialtie_id,
						'comment'        => request('license_comment')[$i],
					]);
			}
		}

		if (!empty(request('qualifications')) && request('qualifications') > 0) {
			$i = 0;
			foreach (request('qualifications') as $qualifications) {
				$UserQualification = UserQualification::create([
						'qualification_name' => request('qualification_name')[$i],
						'user_id'            => $userjobs->user_id,
						'user_job_id'        => $userjobs->id,
						'qualification_file' => it()->upload($qualifications, 'userqualifications/'.$userjobs->user_id),
						'occupation_id'      => $userjobs->occupation_id,
						'specialtie_id'      => $userjobs->specialtie_id,
						'comment'            => request('qualifications_comment')[$i],
					]);
			}
		}

		if (!empty(request('experiences')) && request('experiences') > 0) {
			$i = 0;
			foreach (request('experiences') as $experiences) {
				$UserExperience = UserExperience::create([
						'experience_name' => request('experience_name')[$i],
						'user_id'         => $userjobs->user_id,
						'user_job_id'     => $userjobs->id,
						'experience_file' => it()->upload($experiences, 'userexperiences/'.$userjobs->user_id),
						'occupation_id'   => $userjobs->occupation_id,
						'specialtie_id'   => $userjobs->specialtie_id,
						'comment'         => request('experience_comment')[$i],
					]);
			}
		}

		$userjobs = UserJob::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $userjobs,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$userjobs = UserJob::find($id);
		if (is_null($userjobs) || empty($userjobs)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("userjobs"));
		}

		it()->delete('userjob', $id);
		$userjobs->delete();
		return redirectWithSuccess(aurl("userjobs"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$userjobs = UserJob::find($id);
				if (is_null($userjobs) || empty($userjobs)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("userjobs"));
				}

				it()->delete('userjob', $id);
				$userjobs->delete();
			}
			return redirectWithSuccess(aurl("userjobs"), trans('admin.deleted'));
		} else {
			$userjobs = UserJob::find($data);
			if (is_null($userjobs) || empty($userjobs)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("userjobs"));
			}

			it()->delete('userjob', $data);
			$userjobs->delete();
			return redirectWithSuccess(aurl("userjobs"), trans('admin.deleted'));
		}
	}

	public function get_specialtie_id() {
		if (request()->ajax()) {
			if (request("occupation_id") > 0) {
				$select = request("select") > 0?request("select"):"";
				return \Form::select("specialtie_id", \App\Models\Specialtie::where("occupation_id", request("occupation_id"))->pluck('specialty_name_ar', 'id'), $select, ["class" => "form-control select2", "placeholder" => trans("admin.choose"), "id" => "specialtie_id"]);
			}
		} else {
			return "<select class='form-control'></select>";
		}
	}

}