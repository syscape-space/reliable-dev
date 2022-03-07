<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\OrderOfferInvoicesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\OrderOfferInvoicesRequest;
use App\Models\OrderOfferInvoice;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class OrderOfferInvoices extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:orderofferinvoices_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:orderofferinvoices_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:orderofferinvoices_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:orderofferinvoices_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(OrderOfferInvoicesDataTable $orderofferinvoices) {
		return $orderofferinvoices->render('admin.orderofferinvoices.index', ['title' => trans('admin.orderofferinvoices')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.orderofferinvoices.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(OrderOfferInvoicesRequest $request) {
		$data                                      = $request->except("_token", "_method");
		$data['added_amount_to_vendor_balance_at'] = date('Y-m-d H:i', strtotime(request('added_amount_to_vendor_balance_at')));
		$orderofferinvoices                        = OrderOfferInvoice::create($data);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $orderofferinvoices,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$orderofferinvoices = OrderOfferInvoice::find($id);
		return is_null($orderofferinvoices) || empty($orderofferinvoices)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderofferinvoices")):
		view('admin.orderofferinvoices.show', [
				'title'              => trans('admin.show'),
				'orderofferinvoices' => $orderofferinvoices,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$orderofferinvoices = OrderOfferInvoice::find($id);
		return is_null($orderofferinvoices) || empty($orderofferinvoices)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderofferinvoices")):
		view('admin.orderofferinvoices.edit', [
				'title'              => trans('admin.edit'),
				'orderofferinvoices' => $orderofferinvoices,
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
		foreach (array_keys((new OrderOfferInvoicesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(OrderOfferInvoicesRequest $request, $id) {
		// Check Record Exists
		$orderofferinvoices = OrderOfferInvoice::find($id);
		if (is_null($orderofferinvoices) || empty($orderofferinvoices)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("orderofferinvoices"));
		}
		$data                                      = $this->updateFillableColumns();
		$data['added_amount_to_vendor_balance_at'] = date('Y-m-d H:i', strtotime(request('added_amount_to_vendor_balance_at')));
		OrderOfferInvoice::where('id', $id)->update($data);

		$orderofferinvoices = OrderOfferInvoice::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $orderofferinvoices,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$orderofferinvoices = OrderOfferInvoice::find($id);
		if (is_null($orderofferinvoices) || empty($orderofferinvoices)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("orderofferinvoices"));
		}

		it()->delete('orderofferinvoice', $id);
		$orderofferinvoices->delete();
		return redirectWithSuccess(aurl("orderofferinvoices"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$orderofferinvoices = OrderOfferInvoice::find($id);
				if (is_null($orderofferinvoices) || empty($orderofferinvoices)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("orderofferinvoices"));
				}

				it()->delete('orderofferinvoice', $id);
				$orderofferinvoices->delete();
			}
			return redirectWithSuccess(aurl("orderofferinvoices"), trans('admin.deleted'));
		} else {
			$orderofferinvoices = OrderOfferInvoice::find($data);
			if (is_null($orderofferinvoices) || empty($orderofferinvoices)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("orderofferinvoices"));
			}

			it()->delete('orderofferinvoice', $data);
			$orderofferinvoices->delete();
			return redirectWithSuccess(aurl("orderofferinvoices"), trans('admin.deleted'));
		}
	}

}