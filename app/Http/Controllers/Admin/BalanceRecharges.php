<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\BalanceRechargesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\BalanceRechargesRequest;
use App\Models\BalanceRecharge;
use App\Models\User;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class BalanceRecharges extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:balancerecharges_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:balancerecharges_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:balancerecharges_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:balancerecharges_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(BalanceRechargesDataTable $balancerecharges) {
		return $balancerecharges->render('admin.balancerecharges.index', ['title' => trans('admin.balancerecharges')]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.balancerecharges.create', ['title' => trans('admin.create')]);
	}

	public function updateBalance($id, $balance) {
		$user                  = User::find($id);
		$user->current_balance = $user->current_balance > 0?($balance+$user->current_balance):$balance;
		$user->save();
	}
	/**
	 * Baboon Script By [it v 1.6.38]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(BalanceRechargesRequest $request) {
		$data                   = $request->except("_token", "_method");
		$data['transfer_image'] = "";
		$data['admin_id']       = admin()->id();
		$balancerecharges       = BalanceRecharge::create($data);

		if (request('charge_status') == 'done') {
			$this->updateBalance(request('user_id'), request('amount'));
		}
		if (request()->hasFile('transfer_image')) {
			$balancerecharges->transfer_image = it()->upload('transfer_image', 'balancerecharges/'.$balancerecharges->id);
			$balancerecharges->save();
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $balancerecharges,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.38]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$balancerecharges = BalanceRecharge::find($id);
		return is_null($balancerecharges) || empty($balancerecharges)?
		backWithError(trans("admin.undefinedRecord"), aurl("balancerecharges")):
		view('admin.balancerecharges.show', [
				'title'            => trans('admin.show'),
				'balancerecharges' => $balancerecharges,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$balancerecharges = BalanceRecharge::find($id);
		return is_null($balancerecharges) || empty($balancerecharges)?
		backWithError(trans("admin.undefinedRecord"), aurl("balancerecharges")):
		view('admin.balancerecharges.edit', [
				'title'            => trans('admin.edit'),
				'balancerecharges' => $balancerecharges,
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
		foreach (array_keys((new BalanceRechargesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(BalanceRechargesRequest $request, $id) {
		// Check Record Exists
		$balancerecharges = BalanceRecharge::find($id);
		if (is_null($balancerecharges) || empty($balancerecharges)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("balancerecharges"));
		}
		$data             = $this->updateFillableColumns();
		$data['admin_id'] = admin()->id();
		if (request()->hasFile('transfer_image')) {
			it()        ->delete($balancerecharges->transfer_image);
			$data['transfer_image'] = it()->upload('transfer_image', 'balancerecharges');
		}
		BalanceRecharge::where('id', $id)->update($data);

		if (request('charge_status') == 'done' && $balancerecharges->charge_status != 'done') {
			$this->updateBalance(request('user_id'), request('amount'));
		}

		$balancerecharges = BalanceRecharge::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $balancerecharges,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$balancerecharges = BalanceRecharge::find($id);
		if (is_null($balancerecharges) || empty($balancerecharges)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("balancerecharges"));
		}
		if (!empty($balancerecharges->transfer_image)) {
			it()                       ->delete($balancerecharges->transfer_image);}

		it()->delete('balancerecharge', $id);
		$balancerecharges->delete();
		return redirectWithSuccess(aurl("balancerecharges"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$balancerecharges = BalanceRecharge::find($id);
				if (is_null($balancerecharges) || empty($balancerecharges)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("balancerecharges"));
				}
				if (!empty($balancerecharges->transfer_image)) {
					it()                       ->delete($balancerecharges->transfer_image);
				}
				it()->delete('balancerecharge', $id);
				$balancerecharges->delete();
			}
			return redirectWithSuccess(aurl("balancerecharges"), trans('admin.deleted'));
		} else {
			$balancerecharges = BalanceRecharge::find($data);
			if (is_null($balancerecharges) || empty($balancerecharges)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("balancerecharges"));
			}

			if (!empty($balancerecharges->transfer_image)) {
				it()                       ->delete($balancerecharges->transfer_image);
			}it()->delete('balancerecharge', $data);
			$balancerecharges->delete();
			return redirectWithSuccess(aurl("balancerecharges"), trans('admin.deleted'));
		}
	}

}