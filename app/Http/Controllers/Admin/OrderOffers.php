<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\OrderOffersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserInvoices\OfferInvoices;
use App\Http\Controllers\Validations\OrderOffersRequest;
use App\Models\OrderOffer;
use App\Models\OrderOfferInvoice;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class OrderOffers extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:orderoffers_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:orderoffers_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:orderoffers_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:orderoffers_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(OrderOffersDataTable $orderoffers) {
		return $orderoffers->render('admin.orderoffers.index', ['title' => trans('admin.orderoffers')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$temp_id = (time()*rand(0000, 9999));
		if (empty(request("temp_id")) || !request()->has("temp_id")) {
			return redirect(aurl("orderoffers/create?temp_id=".$temp_id));
		}

		return view('admin.orderoffers.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(OrderOffersRequest $request) {
		$data = $request->except("_token", "_method");

		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id   = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);
		$orderoffers = OrderOffer::create($data);
		OfferInvoices::createOrUpdate($orderoffers);
		// refused other offers if approve one offer
		$this->refused_offers($orderoffers);

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("orderoffers", $dz_id, $orderoffers->id);
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $orderoffers,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$orderoffers = OrderOffer::find($id);
		return is_null($orderoffers) || empty($orderoffers)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderoffers")):
		view('admin.orderoffers.show', [
				'title'       => trans('admin.show'),
				'orderoffers' => $orderoffers,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$orderoffers = OrderOffer::find($id);
		return is_null($orderoffers) || empty($orderoffers)?
		backWithError(trans("admin.undefinedRecord"), aurl("orderoffers")):
		view('admin.orderoffers.edit', [
				'title'       => trans('admin.edit'),
				'orderoffers' => $orderoffers,
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
		foreach (array_keys((new OrderOffersRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}
	public function refused_offers($orderoffers) {
		if ($orderoffers->offer_status == 'approved') {
			OrderOffer::where('order_id', $orderoffers->order_id)
				->where('id', '!=', $orderoffers->id)->update([
					'offer_status' => 'refused',
				]);
			// recovered and close other invoices
			OrderOfferInvoice::where('order_id', $orderoffers->order_id)->where('id', '!=', $orderoffers->id)->update([
					'amount_deduction_from_user'     => 'recovered',
					'added_amount_to_vendor_balance' => 'no',
					'inovice_status'                 => 'closed',
				]);
		}
	}

	public function update(OrderOffersRequest $request, $id) {
		// Check Record Exists
		$orderoffers = OrderOffer::find($id);
		if (is_null($orderoffers) || empty($orderoffers)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("orderoffers"));
		}
		$data = $this->updateFillableColumns();
		OrderOffer::where('id', $id)->update($data);
		$orderoffers = OrderOffer::find($id);
		// refused other offers if approve one offer
		$this->refused_offers($orderoffers);

		// Update Invoice
		OfferInvoices::createOrUpdate($orderoffers);

		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $orderoffers,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$orderoffers = OrderOffer::find($id);
		if (is_null($orderoffers) || empty($orderoffers)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("orderoffers"));
		}

		it()->delete('orderoffer', $id);
		$orderoffers->delete();
		return redirectWithSuccess(aurl("orderoffers"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$orderoffers = OrderOffer::find($id);
				if (is_null($orderoffers) || empty($orderoffers)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("orderoffers"));
				}

				it()->delete('orderoffer', $id);
				$orderoffers->delete();
			}
			return redirectWithSuccess(aurl("orderoffers"), trans('admin.deleted'));
		} else {
			$orderoffers = OrderOffer::find($data);
			if (is_null($orderoffers) || empty($orderoffers)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("orderoffers"));
			}

			it()->delete('orderoffer', $data);
			$orderoffers->delete();
			return redirectWithSuccess(aurl("orderoffers"), trans('admin.deleted'));
		}
	}

	// Delete Files From Dropzone Library
	public function delete_file() {
		if (request("type_file") && request("type_id")) {
			if (it()->getFile(request("type_file"), request("type_id"))) {
				it()   ->delete(null, null, request("id"));
				return response([
						"status" => true,
					], 200);
			}
		}
	}

	// Multi upload with dropzone
	public function multi_upload() {
		if (request()->ajax()) {
			$rules = [];
			if (request()->hasFile("dz_offer")) {
				$rules["dz_offer"] = "sometimes|nullable|file";
			}

			$this->validate(request(), $rules, [], [
					"dz_offer" => trans("admin.dz_offer"),

				]);

			if (request()->hasFile("dz_offer")) {
				it()        ->upload("dz_offer", request("dz_path"), "orderoffers", request("dz_id"));
			}

			return response([
					"status" => true,
					"type"   => request("dz_type"),
					"file"   => it()->getFile("orderoffers", request("dz_id")),
				], 200);
		}

	}

}