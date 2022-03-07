<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\OrderArbitratorsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\OrderArbitratorsRequest;
use App\Models\OrderArbitrator;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class OrderArbitrators extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:orderarbitrators_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:orderarbitrators_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:orderarbitrators_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:orderarbitrators_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(OrderArbitratorsDataTable $orderarbitrators) {
		return $orderarbitrators->render('admin.orderarbitrators.index', ['title' => trans('admin.orderarbitrators')]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.orderarbitrators.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(OrderArbitratorsRequest $request) {
		$data             = $request->except("_token", "_method");
		$orderarbitrators = OrderArbitrator::create($data);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $orderarbitrators,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.38]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$orderarbitrators = OrderArbitrator::find($id);
		return is_null($orderarbitrators) || empty($orderarbitrators)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderarbitrators")):
		view('admin.orderarbitrators.show', [
				'title'            => trans('admin.show'),
				'orderarbitrators' => $orderarbitrators,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$orderarbitrators = OrderArbitrator::find($id);
		return is_null($orderarbitrators) || empty($orderarbitrators)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderarbitrators")):
		view('admin.orderarbitrators.edit', [
				'title'            => trans('admin.edit'),
				'orderarbitrators' => $orderarbitrators,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * update a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function updateFillableColumns() {
		$fillableCols = [];
		foreach (array_keys((new OrderArbitratorsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(OrderArbitratorsRequest $request, $id) {
		// Check Record Exists
		$orderarbitrators = OrderArbitrator::find($id);
		if (is_null($orderarbitrators) || empty($orderarbitrators)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("orderarbitrators"));
		}
		$data = $this->updateFillableColumns();
		OrderArbitrator::where('id', $id)->update($data);

		$orderarbitrators = OrderArbitrator::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $orderarbitrators,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$orderarbitrators = OrderArbitrator::find($id);
		if (is_null($orderarbitrators) || empty($orderarbitrators)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("orderarbitrators"));
		}

		it()->delete('orderarbitrator', $id);
		$orderarbitrators->delete();
		return redirectWithSuccess(aurl("orderarbitrators"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$orderarbitrators = OrderArbitrator::find($id);
				if (is_null($orderarbitrators) || empty($orderarbitrators)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("orderarbitrators"));
				}

				it()->delete('orderarbitrator', $id);
				$orderarbitrators->delete();
			}
			return redirectWithSuccess(aurl("orderarbitrators"), trans('admin.deleted'));
		} else {
			$orderarbitrators = OrderArbitrator::find($data);
			if (is_null($orderarbitrators) || empty($orderarbitrators)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("orderarbitrators"));
			}

			it()->delete('orderarbitrator', $data);
			$orderarbitrators->delete();
			return redirectWithSuccess(aurl("orderarbitrators"), trans('admin.deleted'));
		}
	}

}