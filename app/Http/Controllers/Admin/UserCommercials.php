<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\UserCommercialsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\UserCommercialsRequest;
use App\Models\UserCommercial;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserCommercials extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:usercommercials_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:usercommercials_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:usercommercials_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:usercommercials_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(UserCommercialsDataTable $usercommercials) {
		return $usercommercials->render('admin.usercommercials.index', ['title' => trans('admin.usercommercials')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.usercommercials.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(UserCommercialsRequest $request) {
		$data                    = $request->except("_token", "_method");
		$data['commercial_file'] = "";
		$usercommercials         = UserCommercial::create($data);
		if (request()->hasFile('commercial_file')) {
			$usercommercials->commercial_file = it()->upload('commercial_file', 'usercommercials/'.$usercommercials->user_id);
			$usercommercials->save();
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $usercommercials,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$usercommercials = UserCommercial::find($id);
		return is_null($usercommercials) || empty($usercommercials)?
		backWithError(trans("admin.undefinedRecord"), aurl("usercommercials")):
		view('admin.usercommercials.show', [
				'title'           => trans('admin.show'),
				'usercommercials' => $usercommercials,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$usercommercials = UserCommercial::find($id);
		return is_null($usercommercials) || empty($usercommercials)?
		backWithError(trans("admin.undefinedRecord"), aurl("usercommercials")):
		view('admin.usercommercials.edit', [
				'title'           => trans('admin.edit'),
				'usercommercials' => $usercommercials,
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
		foreach (array_keys((new UserCommercialsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(UserCommercialsRequest $request, $id) {
		// Check Record Exists
		$usercommercials = UserCommercial::find($id);
		if (is_null($usercommercials) || empty($usercommercials)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("usercommercials"));
		}
		$data = $this->updateFillableColumns();
		if (request()->hasFile('commercial_file')) {
			it()        ->delete($usercommercials->commercial_file);
			$data['commercial_file'] = it()->upload('commercial_file', 'usercommercials/'.$usercommercials->user_id);
		}
		UserCommercial::where('id', $id)->update($data);

		$usercommercials = UserCommercial::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $usercommercials,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$usercommercials = UserCommercial::find($id);
		if (is_null($usercommercials) || empty($usercommercials)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("usercommercials"));
		}
		if (!empty($usercommercials->commercial_file)) {
			it()                      ->delete($usercommercials->commercial_file);}

		it()->delete('usercommercial', $id);
		$usercommercials->delete();
		return redirectWithSuccess(aurl("usercommercials"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$usercommercials = UserCommercial::find($id);
				if (is_null($usercommercials) || empty($usercommercials)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("usercommercials"));
				}
				if (!empty($usercommercials->commercial_file)) {
					it()                      ->delete($usercommercials->commercial_file);
				}
				it()->delete('usercommercial', $id);
				$usercommercials->delete();
			}
			return redirectWithSuccess(aurl("usercommercials"), trans('admin.deleted'));
		} else {
			$usercommercials = UserCommercial::find($data);
			if (is_null($usercommercials) || empty($usercommercials)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("usercommercials"));
			}

			if (!empty($usercommercials->commercial_file)) {
				it()                      ->delete($usercommercials->commercial_file);
			}it()->delete('usercommercial', $data);
			$usercommercials->delete();
			return redirectWithSuccess(aurl("usercommercials"), trans('admin.deleted'));
		}
	}

}