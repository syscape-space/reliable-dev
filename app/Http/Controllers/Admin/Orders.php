<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\OrdersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\OrdersRequest;
use App\Models\Order;
use App\Models\OrderArbitrator;
use App\Models\OrderCaseAgainst;
use App\Models\OrderVendors;
use Form;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Orders extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:orders_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:orders_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:orders_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:orders_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(OrdersDataTable $orders) {
		
		return $orders->render('admin.orders.index', ['title' => trans('admin.orders')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$temp_id = (time()*rand(0000, 9999));
		if (empty(request("temp_id")) || !request()->has("temp_id")) {
			return redirect(aurl("orders/create?temp_id=".$temp_id));
		}

		return view('admin.orders.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function order_case_against($order_id) {
		//return request('name');
		OrderCaseAgainst::where('order_id', $order_id)->delete();
		if (!empty(request('name')) && is_array(request('name')) && count(request('name')) > 0
			 && !empty(request('id_number')) && is_array(request('id_number')) && count(request('id_number')) > 0
			 && !empty(request('nationality')) && is_array(request('nationality')) && count(request('nationality')) > 0
		) {
			$i = 0;
			foreach (request('name') as $name) {
				$id_number   = !empty(request('id_number')[$i])?request('id_number')[$i]:'';
				$nationality = !empty(request('nationality')[$i])?request('nationality')[$i]:'';
				if (!empty($name) && !empty($id_number) && !empty($nationality)) {
					OrderCaseAgainst::create([
							'order_id'    => $order_id,
							'name'        => $name,
							'id_number'   => $id_number,
							'nationality' => $nationality,
						]);
				}
				$i++;
			}
		}
	}

	public function order_arbitrator($order_id) {
//		OrderArbitrator::where('order_id', $order_id)->delete();
//		if (!empty(request('arbitrators')) && is_array(request('arbitrators')) && count(request('arbitrators')) > 0) {
//			$i = 0;
//			foreach (request('arbitrators') as $arbitrator) {
//				OrderArbitrator::create([
//						'order_id'      => $order_id,
//						'arbitrator_id' => $arbitrator,
//					]);
//				$i++;
//			}
//		}
	}

	public function order_vendors($order_id) {
		OrderVendors::where('order_id', $order_id)->delete();
		if (!empty(request('vendors')) && is_array(request('vendors')) && count(request('vendors')) > 0) {
			$i = 0;
			foreach (request('vendors') as $vendor) {
				OrderVendors::create([
						'order_id' => $order_id,
						'user_id'  => $vendor,
					]);
				$i++;
			}
		}
	}

	public function store(OrdersRequest $request) {
		$data = $request->except("_token", "_method");

		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id   = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);

		$data['negotiable'] = !empty(request('negotiable')) && request('negotiable') == 'yes'?'yes':'no';
		$data['admin_id']   = admin()->id();
		$data['show_order_data']   = 'yes';
		$orders             = Order::create($data);

		// Update Use Balance to suspend amount
		orderBalance()->updateBalance($orders);

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("orders", $dz_id, $orders->id);
		}
		// Add Case Against People
		$this->order_case_against($orders->id);
		$this->order_arbitrator($orders->id);
		$this->order_vendors($orders->id);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $orders,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$orders = Order::find($id);

		return is_null($orders) || empty($orders)?
		backWithError(trans("admin.undefinedRecord"), aurl("orders")):
		view('admin.orders.show', [
				'title'  => trans('admin.show').' - '.$orders->order_title,
				'orders' => $orders,
				'offers' => $orders->offers()->where(function ($q) {
						if (request('tab') == 'accept_offer') {
							$q->where('offer_status', 'approved');
						}
					})->orderBy('id', 'desc')->paginate(),
				'invoices'              => $orders->invoices()->orderBy('id', 'desc')->paginate(),
				'arbitration_decisions' => $orders->arbitrators()->orderBy('id', 'desc')->paginate(),
				'arbitratorInvoices'    => $orders->arbitratorInvoices()->orderBy('id', 'desc')->paginate(50),
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$orders = Order::find($id);
		return is_null($orders) || empty($orders)?
		backWithError(trans("admin.undefinedRecord"), aurl("orders")):
		view('admin.orders.edit', [
				'title'  => trans('admin.edit'),
				'orders' => $orders,
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
		foreach (array_keys((new OrdersRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(OrdersRequest $request, $id) {
	    
		// Check Record Exists
		$orders = Order::find($id);
		if (is_null($orders) || empty($orders)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("orders"));
		}
		$data               = $this->updateFillableColumns();
		$data['admin_id']   = admin()->id();
		$data['negotiable'] = !empty(request('negotiable')) && request('negotiable') == 'yes'?'yes':'no';

		// Update Use Balance to suspend amount when change last amount from order
		if ($data['amount'] != $orders->amount && in_array(request('order_status'), ['open', 'under_review'])) {
			orderBalance()               ->updateBalance($orders, $data['amount']);
		}
		// if close and refund order to recovered money from vendor and rollback money to owner
		 elseif (request('order_status') == 'close_and_refund' || request('order_status') == 'refused') {
			if ($orders->refunded != 'yes') {
				$data['refunded'] = 'yes';
				// rollback Balance if User Or Admin went to delete or refund order
				orderBalance()->rollbackOrder($orders);
			}
		}
		// if closed order and transfare all money to vendor
		 elseif (request('order_status') == 'closed') {
			$data['refunded'] = 'no';
			orderBalance()->transfareBalanceToVendor($orders);
		}
		// if re opened the order and re suspend amount again
		 elseif ($orders->order_status == 'close_and_refund' && in_array(request('order_status'), ['open', 'under_review'])) {
			orderBalance() ->updateBalance($orders);
		}

		if ($orders->order_status != 'close_and_refund') {
			$data['refunded'] = 'no';
		}

		Order::where('id', $id)->update($data);

		$orders = Order::find($id);

		// Add Case Against People
		$this->order_case_against($id);
		$this->order_arbitrator($id);
		$this->order_vendors($id);

		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $orders,
			]);
	}

	public function checkApprovedOffers($order) {
		$approvedOffers = $order->offers()->where('offer_status', 'approved')->count();
		return $approvedOffers > 0?true:false;
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$orders = Order::find($id);
		if (is_null($orders) || empty($orders)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("orders"));
		} elseif ($this->checkApprovedOffers($orders)) {
			return backWithError(trans('admin.cannotDeleteOrderHadOffer', ['id' => $id, 'title' => $orders->order_title]), aurl("orders"));
		}
		// rollback Balance if User Or Admin went to delete order
		orderBalance()->rollbackOrder($orders);

		it()->delete('orders', $id);
		$orders->delete();
		return redirectWithSuccess(aurl("orders"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$orders = Order::find($id);
				if (is_null($orders) || empty($orders)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("orders"));
				} elseif ($this->checkApprovedOffers($orders)) {
					return backWithError(trans('admin.cannotDeleteOrderHadOffer', ['id' => $id, 'title' => $orders->order_title]), aurl("orders"));
				}
				// rollback Balance if User Or Admin went to delete order
				orderBalance()->rollbackOrder($orders);

				it()->delete('orders', $id);
				$orders->delete();
			}
			return redirectWithSuccess(aurl("orders"), trans('admin.deleted'));
		} else {
			$orders = Order::find($data);
			if (is_null($orders) || empty($orders)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("orders"));
			} elseif ($this->checkApprovedOffers($orders)) {
				return backWithError(trans('admin.cannotDeleteOrderHadOffer', ['id' => $data, 'title' => $orders->order_title]), aurl("orders"));
			}
			// rollback Balance if User Or Admin went to delete order
			orderBalance()->rollbackOrder($orders);

			it()->delete('orders', $data);
			$orders->delete();
			return redirectWithSuccess(aurl("orders"), trans('admin.deleted'));
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
			if (request()->hasFile("dz_order_attachments")) {
				$rules["dz_order_attachments"] = "sometimes|nullable|file";
			}

			$this->validate(request(), $rules, [], [
					"dz_order_attachments" => trans("admin.dz_order_attachments"),

				]);

			if (request()->hasFile("dz_order_attachments")) {
				it()        ->upload("dz_order_attachments", request("dz_path"), "orders", request("dz_id"));
			}

			return response([
					"status" => true,
					"type"   => request("dz_type"),
					"file"   => it()->getFile("orders", request("dz_id")),
				], 200);
		}

	}
	public function get_city_id() {
		if (request()->ajax()) {
			if (request("country_id") > 0) {
				$select = request("select") > 0?request("select"):"";
				return \Form::select("city_id", \App\Models\City::where("country_id", request("country_id"))->pluck('city_name_ar', 'id'), $select, ["class" => "form-control select2", "placeholder" => trans("admin.choose"), "id" => "city_id"]);
			}
		} else {
			return "<select class='form-control'></select>";
		}
	}

	// get User Orders to linked with main order
	public function get_user_orders() {
		if (request()->ajax()) {
			if (request('user_id') > 0) {
				$selected = request('selected') > 0?request('selected'):'';
				return Form::select('main_order_id', Order::where('user_id', request('user_id'))->where('order_status', 'open')
					->where(function ($q) {
							if (!empty(request('without_order'))) {
								$q->where('id', '!=', request('without_order'));
							}
						})
						->pluck('order_title', 'id'), $selected, ['class' => 'form-control select2 main_order_id', 'placeholder' => trans('admin.choose')]);
			}
		}
	}

}