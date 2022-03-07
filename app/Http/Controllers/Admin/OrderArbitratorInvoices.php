<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\OrderArbitratorInvoicesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\OrderArbitratorInvoicesRequest;
use App\Models\OrderArbitratorInvoice;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class OrderArbitratorInvoices extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:orderarbitratorinvoices_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:orderarbitratorinvoices_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:orderarbitratorinvoices_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:orderarbitratorinvoices_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(OrderArbitratorInvoicesDataTable $orderarbitratorinvoices) {
		return $orderarbitratorinvoices->render('admin.orderarbitratorinvoices.index', ['title' => trans('admin.orderarbitratorinvoices')]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.orderarbitratorinvoices.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(OrderArbitratorInvoicesRequest $request) {
		$data                                   = $request->except("_token", "_method");
		$tax                                    = getPercentFromSetting('arbitration_amount_tax', request('total_amount'));
		$remaining                              = request('total_amount')-$tax;
		$data['system_tax']                     = $tax;
		$data['remaining_amount_to_arbitrator'] = $remaining;
		$orderarbitratorinvoices                = OrderArbitratorInvoice::create($data);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $orderarbitratorinvoices,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.38]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
		return is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderarbitratorinvoices")):
		view('admin.orderarbitratorinvoices.show', [
				'title'                   => trans('admin.show'),
				'orderarbitratorinvoices' => $orderarbitratorinvoices,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
		return is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderarbitratorinvoices")):
		view('admin.orderarbitratorinvoices.edit', [
				'title'                   => trans('admin.edit'),
				'orderarbitratorinvoices' => $orderarbitratorinvoices,
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
		foreach (array_keys((new OrderArbitratorInvoicesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(OrderArbitratorInvoicesRequest $request, $id) {
		// Check Record Exists
		$orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
		if (is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("orderarbitratorinvoices"));
		}
		$data                                   = $this->updateFillableColumns();
		$tax                                    = getPercentFromSetting('arbitration_amount_tax', request('total_amount'));
		$remaining                              = request('total_amount')-$tax;
		$data['system_tax']                     = $tax;
		$data['remaining_amount_to_arbitrator'] = $remaining;
		OrderArbitratorInvoice::where('id', $id)->update($data);

		$orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $orderarbitratorinvoices,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
		if (is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("orderarbitratorinvoices"));
		}

		it()->delete('orderarbitratorinvoice', $id);
		$orderarbitratorinvoices->delete();
		return redirectWithSuccess(aurl("orderarbitratorinvoices"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
				if (is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("orderarbitratorinvoices"));
				}

				it()->delete('orderarbitratorinvoice', $id);
				$orderarbitratorinvoices->delete();
			}
			return redirectWithSuccess(aurl("orderarbitratorinvoices"), trans('admin.deleted'));
		} else {
			$orderarbitratorinvoices = OrderArbitratorInvoice::find($data);
			if (is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("orderarbitratorinvoices"));
			}

			it()->delete('orderarbitratorinvoice', $data);
			$orderarbitratorinvoices->delete();
			return redirectWithSuccess(aurl("orderarbitratorinvoices"), trans('admin.deleted'));
		}
	}

}