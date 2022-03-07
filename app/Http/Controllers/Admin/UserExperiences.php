<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\UserExperiencesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\UserExperiencesRequest;
use App\Models\UserExperience;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserExperiences extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:userexperiences_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:userexperiences_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:userexperiences_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:userexperiences_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(UserExperiencesDataTable $userexperiences) {
		return $userexperiences->render('admin.userexperiences.index', ['title' => trans('admin.userexperiences')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.userexperiences.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(UserExperiencesRequest $request) {
		$data                    = $request->except("_token", "_method");
		$data['experience_file'] = "";
		$userexperiences         = UserExperience::create($data);
		if (request()->hasFile('experience_file')) {
			$userexperiences->experience_file = it()->upload('experience_file', 'userexperiences/'.$userexperiences->user_id);
			$userexperiences->save();
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $userexperiences,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$userexperiences = UserExperience::find($id);
		return is_null($userexperiences) || empty($userexperiences)?
		backWithError(trans("admin.undefinedRecord"), aurl("userexperiences")):
		view('admin.userexperiences.show', [
				'title'           => trans('admin.show'),
				'userexperiences' => $userexperiences,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$userexperiences = UserExperience::find($id);
		return is_null($userexperiences) || empty($userexperiences)?
		backWithError(trans("admin.undefinedRecord"), aurl("userexperiences")):
		view('admin.userexperiences.edit', [
				'title'           => trans('admin.edit'),
				'userexperiences' => $userexperiences,
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
		foreach (array_keys((new UserExperiencesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(UserExperiencesRequest $request, $id) {
		// Check Record Exists
		$userexperiences = UserExperience::find($id);
		if (is_null($userexperiences) || empty($userexperiences)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("userexperiences"));
		}
		$data = $this->updateFillableColumns();
		if (request()->hasFile('experience_file')) {
			it()        ->delete($userexperiences->experience_file);
			$data['experience_file'] = it()->upload('experience_file', 'userexperiences/'.$userexperiences->user_id);
		}
		UserExperience::where('id', $id)->update($data);

		$userexperiences = UserExperience::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $userexperiences,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$userexperiences = UserExperience::find($id);
		if (is_null($userexperiences) || empty($userexperiences)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("userexperiences"));
		}
		if (!empty($userexperiences->experience_file)) {
			it()                      ->delete($userexperiences->experience_file);}

		it()->delete('userexperience', $id);
		$userexperiences->delete();
		return redirectWithSuccess(aurl("userexperiences"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$userexperiences = UserExperience::find($id);
				if (is_null($userexperiences) || empty($userexperiences)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("userexperiences"));
				}
				if (!empty($userexperiences->experience_file)) {
					it()                      ->delete($userexperiences->experience_file);
				}
				it()->delete('userexperience', $id);
				$userexperiences->delete();
			}
			return redirectWithSuccess(aurl("userexperiences"), trans('admin.deleted'));
		} else {
			$userexperiences = UserExperience::find($data);
			if (is_null($userexperiences) || empty($userexperiences)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("userexperiences"));
			}

			if (!empty($userexperiences->experience_file)) {
				it()                      ->delete($userexperiences->experience_file);
			}it()->delete('userexperience', $data);
			$userexperiences->delete();
			return redirectWithSuccess(aurl("userexperiences"), trans('admin.deleted'));
		}
	}

}