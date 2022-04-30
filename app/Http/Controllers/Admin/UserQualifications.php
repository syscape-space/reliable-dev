<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\UserQualificationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\UserQualificationsRequest;
use App\Models\UserQualification;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserQualifications extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:userqualifications_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:userqualifications_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:userqualifications_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:userqualifications_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(UserQualificationsDataTable $userqualifications) {
		return $userqualifications->render('admin.userqualifications.index', ['title' => trans('admin.userqualifications')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.userqualifications.create', [
			'title' => trans('admin.create'),
			'user_id' => request()->user_id
		]);
		
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(UserQualificationsRequest $request) {
		$data                       = $request->except("_token", "_method");
		$data['qualification_file'] = "";
		$userqualifications         = UserQualification::create($data);
		if (request()->hasFile('qualification_file')) {
			$userqualifications->qualification_file = it()->upload('qualification_file', 'userqualifications/'.$userqualifications->user_id);
			$userqualifications->save();
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $userqualifications,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$userqualifications = UserQualification::find($id);
		return is_null($userqualifications) || empty($userqualifications)?
		backWithError(trans("admin.undefinedRecord"), aurl("userqualifications")):
		view('admin.userqualifications.show', [
				'title'              => trans('admin.show'),
				'userqualifications' => $userqualifications,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$userqualifications = UserQualification::find($id);
		return is_null($userqualifications) || empty($userqualifications)?
		backWithError(trans("admin.undefinedRecord"), aurl("userqualifications")):
		view('admin.userqualifications.edit', [
				'title'              => trans('admin.edit'),
				'userqualifications' => $userqualifications,
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
		foreach (array_keys((new UserQualificationsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(UserQualificationsRequest $request, $id) {
		// Check Record Exists
		$userqualifications = UserQualification::find($id);
		if (is_null($userqualifications) || empty($userqualifications)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("userqualifications"));
		}
		$data = $this->updateFillableColumns();
		if (request()->hasFile('qualification_file')) {
			it()        ->delete($userqualifications->qualification_file);
			$data['qualification_file'] = it()->upload('qualification_file', 'userqualifications/'.$userqualifications->user_id);
		}
		UserQualification::where('id', $id)->update($data);

		$userqualifications = UserQualification::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $userqualifications,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$userqualifications = UserQualification::find($id);
		if (is_null($userqualifications) || empty($userqualifications)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("userqualifications"));
		}
		if (!empty($userqualifications->qualification_file)) {
			it()                         ->delete($userqualifications->qualification_file);}

		it()->delete('userqualification', $id);
		$userqualifications->delete();
		return redirectWithSuccess(aurl("userqualifications"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$userqualifications = UserQualification::find($id);
				if (is_null($userqualifications) || empty($userqualifications)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("userqualifications"));
				}
				if (!empty($userqualifications->qualification_file)) {
					it()                         ->delete($userqualifications->qualification_file);
				}
				it()->delete('userqualification', $id);
				$userqualifications->delete();
			}
			return redirectWithSuccess(aurl("userqualifications"), trans('admin.deleted'));
		} else {
			$userqualifications = UserQualification::find($data);
			if (is_null($userqualifications) || empty($userqualifications)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("userqualifications"));
			}

			if (!empty($userqualifications->qualification_file)) {
				it()                         ->delete($userqualifications->qualification_file);
			}it()->delete('userqualification', $data);
			$userqualifications->delete();
			return redirectWithSuccess(aurl("userqualifications"), trans('admin.deleted'));
		}
	}

}