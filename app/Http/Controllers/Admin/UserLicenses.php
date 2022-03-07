<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\UserLicensesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\UserLicensesRequest;
use App\Models\UserLicense;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserLicenses extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:userlicenses_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:userlicenses_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:userlicenses_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:userlicenses_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(UserLicensesDataTable $userlicenses) {
		return $userlicenses->render('admin.userlicenses.index', ['title' => trans('admin.userlicenses')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.userlicenses.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(UserLicensesRequest $request) {
		$data                 = $request->except("_token", "_method");
		$data['license_file'] = "";
		$userlicenses         = UserLicense::create($data);
		if (request()->hasFile('license_file')) {
			$userlicenses->license_file = it()->upload('license_file', 'userlicenses/'.$userlicenses->user_id);
			$userlicenses->save();
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $userlicenses,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$userlicenses = UserLicense::find($id);
		return is_null($userlicenses) || empty($userlicenses)?
		backWithError(trans("admin.undefinedRecord"), aurl("userlicenses")):
		view('admin.userlicenses.show', [
				'title'        => trans('admin.show'),
				'userlicenses' => $userlicenses,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$userlicenses = UserLicense::find($id);
		return is_null($userlicenses) || empty($userlicenses)?
		backWithError(trans("admin.undefinedRecord"), aurl("userlicenses")):
		view('admin.userlicenses.edit', [
				'title'        => trans('admin.edit'),
				'userlicenses' => $userlicenses,
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
		foreach (array_keys((new UserLicensesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(UserLicensesRequest $request, $id) {
		// Check Record Exists
		$userlicenses = UserLicense::find($id);
		if (is_null($userlicenses) || empty($userlicenses)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("userlicenses"));
		}
		$data = $this->updateFillableColumns();
		if (request()->hasFile('license_file')) {
			it()        ->delete($userlicenses->license_file);
			$data['license_file'] = it()->upload('license_file', 'userlicenses/'.$userlicenses->user_id);
		}
		UserLicense::where('id', $id)->update($data);

		$userlicenses = UserLicense::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $userlicenses,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$userlicenses = UserLicense::find($id);
		if (is_null($userlicenses) || empty($userlicenses)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("userlicenses"));
		}
		if (!empty($userlicenses->license_file)) {
			it()                   ->delete($userlicenses->license_file);}

		it()->delete('userlicense', $id);
		$userlicenses->delete();
		return redirectWithSuccess(aurl("userlicenses"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$userlicenses = UserLicense::find($id);
				if (is_null($userlicenses) || empty($userlicenses)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("userlicenses"));
				}
				if (!empty($userlicenses->license_file)) {
					it()                   ->delete($userlicenses->license_file);
				}
				it()->delete('userlicense', $id);
				$userlicenses->delete();
			}
			return redirectWithSuccess(aurl("userlicenses"), trans('admin.deleted'));
		} else {
			$userlicenses = UserLicense::find($data);
			if (is_null($userlicenses) || empty($userlicenses)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("userlicenses"));
			}

			if (!empty($userlicenses->license_file)) {
				it()                   ->delete($userlicenses->license_file);
			}it()->delete('userlicense', $data);
			$userlicenses->delete();
			return redirectWithSuccess(aurl("userlicenses"), trans('admin.deleted'));
		}
	}

}