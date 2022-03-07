<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\VendorPackagesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\VendorPackagesRequest;
use App\Models\VendorPackage;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class VendorPackages extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:vendorpackages_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:vendorpackages_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:vendorpackages_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:vendorpackages_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(VendorPackagesDataTable $vendorpackages) {
		return $vendorpackages->render('admin.vendorpackages.index', ['title' => trans('admin.vendorpackages')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.vendorpackages.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(VendorPackagesRequest $request) {
		$data                   = $request->except("_token", "_method");
		$data['package_end_at'] = date('Y-m-d', strtotime('+'.request('duration_package_days').' days'));
		$vendorpackages         = VendorPackage::create($data);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $vendorpackages,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$vendorpackages = VendorPackage::find($id);
		return is_null($vendorpackages) || empty($vendorpackages)?
		backWithError(trans("admin.undefinedRecord"), aurl("vendorpackages")):
		view('admin.vendorpackages.show', [
				'title'          => trans('admin.show'),
				'vendorpackages' => $vendorpackages,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$vendorpackages = VendorPackage::find($id);
		return is_null($vendorpackages) || empty($vendorpackages)?
		backWithError(trans("admin.undefinedRecord"), aurl("vendorpackages")):
		view('admin.vendorpackages.edit', [
				'title'          => trans('admin.edit'),
				'vendorpackages' => $vendorpackages,
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
		foreach (array_keys((new VendorPackagesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(VendorPackagesRequest $request, $id) {
		// Check Record Exists
		$vendorpackages = VendorPackage::find($id);
		if (is_null($vendorpackages) || empty($vendorpackages)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("vendorpackages"));
		}
		$data                   = $this->updateFillableColumns();
		$data['package_end_at'] = date('Y-m-d', strtotime('+'.request('duration_package_days').' days'));
		VendorPackage::where('id', $id)->update($data);

		$vendorpackages = VendorPackage::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $vendorpackages,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$vendorpackages = VendorPackage::find($id);
		if (is_null($vendorpackages) || empty($vendorpackages)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("vendorpackages"));
		}

		it()->delete('vendorpackage', $id);
		$vendorpackages->delete();
		return redirectWithSuccess(aurl("vendorpackages"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$vendorpackages = VendorPackage::find($id);
				if (is_null($vendorpackages) || empty($vendorpackages)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("vendorpackages"));
				}

				it()->delete('vendorpackage', $id);
				$vendorpackages->delete();
			}
			return redirectWithSuccess(aurl("vendorpackages"), trans('admin.deleted'));
		} else {
			$vendorpackages = VendorPackage::find($data);
			if (is_null($vendorpackages) || empty($vendorpackages)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("vendorpackages"));
			}

			it()->delete('vendorpackage', $data);
			$vendorpackages->delete();
			return redirectWithSuccess(aurl("vendorpackages"), trans('admin.deleted'));
		}
	}

}