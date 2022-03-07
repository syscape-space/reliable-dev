<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\OccupationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\OccupationsRequest;
use App\Models\Occupation;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Occupations extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:occupations_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:occupations_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:occupations_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:occupations_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(OccupationsDataTable $occupations) {
		return $occupations->render('admin.occupations.index', ['title' => trans('admin.occupations')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.occupations.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(OccupationsRequest $request) {
		$data             = $request->except("_token", "_method");
		$data['admin_id'] = admin()->id();
		$occupations      = Occupation::create($data);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $occupations,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$occupations = Occupation::find($id);
		return is_null($occupations) || empty($occupations)?
		backWithError(trans("admin.undefinedRecord"), aurl("occupations")):
		view('admin.occupations.show', [
				'title'       => trans('admin.show'),
				'occupations' => $occupations,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$occupations = Occupation::find($id);
		return is_null($occupations) || empty($occupations)?
		backWithError(trans("admin.undefinedRecord"), aurl("occupations")):
		view('admin.occupations.edit', [
				'title'       => trans('admin.edit'),
				'occupations' => $occupations,
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
		foreach (array_keys((new OccupationsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(OccupationsRequest $request, $id) {
		// Check Record Exists
		$occupations = Occupation::find($id);
		if (is_null($occupations) || empty($occupations)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("occupations"));
		}
		$data             = $this->updateFillableColumns();
		$data['admin_id'] = admin()->id();
		Occupation::where('id', $id)->update($data);

		$occupations = Occupation::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $occupations,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$occupations = Occupation::find($id);

		if (is_null($occupations) || empty($occupations)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("occupations"));
		} elseif ($id == 8) {
			return backWithError(trans('admin.cannot_delete_id8'), aurl("occupations"));
		}

		it()->delete('occupation', $id);
		$occupations->delete();
		return redirectWithSuccess(aurl("occupations"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$occupations = Occupation::find($id);
				if (is_null($occupations) || empty($occupations)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("occupations"));
				} elseif ($id == 8) {
					return backWithError(trans('admin.cannot_delete_id8'), aurl("occupations"));
				}

				it()->delete('occupation', $id);
				$occupations->delete();
			}
			return redirectWithSuccess(aurl("occupations"), trans('admin.deleted'));
		} else {
			$occupations = Occupation::find($data);
			if (is_null($occupations) || empty($occupations)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("occupations"));
			} elseif ($data == 8) {
				return backWithError(trans('admin.cannot_delete_id8'), aurl("occupations"));
			}

			it()->delete('occupation', $data);
			$occupations->delete();
			return redirectWithSuccess(aurl("occupations"), trans('admin.deleted'));
		}
	}

}