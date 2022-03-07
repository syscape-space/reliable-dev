<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\BalanceWithdrawalsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\BalanceWithdrawalsRequest;
use App\Models\BalanceWithdrawal;
use App\Models\User;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class BalanceWithdrawals extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:balancewithdrawals_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:balancewithdrawals_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:balancewithdrawals_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:balancewithdrawals_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(BalanceWithdrawalsDataTable $balancewithdrawals) {
		return $balancewithdrawals->render('admin.balancewithdrawals.index', ['title' => trans('admin.balancewithdrawals')]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.balancewithdrawals.create', ['title' => trans('admin.create')]);
	}

	public function updateBalance($id, $balance) {
		$user                  = User::find($id);
		$user->current_balance = $user->current_balance > 0?($user->current_balance-$balance):0;
		$user->save();
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(BalanceWithdrawalsRequest $request) {
		$data                     = $request->except("_token", "_method");
		$data['transfer_picture'] = "";
		$data['admin_id']         = admin()->id();
		$balancewithdrawals       = BalanceWithdrawal::create($data);
		if (request()->hasFile('transfer_picture')) {
			$balancewithdrawals->transfer_picture = it()->upload('transfer_picture', 'balancewithdrawals/'.$balancewithdrawals->id);
			$balancewithdrawals->save();
		}
		if (request('withdrawal_status') == 'approved') {
			$this->updateBalance(request('user_id'), request('amount'));
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $balancewithdrawals,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.38]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$balancewithdrawals = BalanceWithdrawal::find($id);
		return is_null($balancewithdrawals) || empty($balancewithdrawals)?
		backWithError(trans("admin.undefinedRecord"), aurl("balancewithdrawals")):
		view('admin.balancewithdrawals.show', [
				'title'              => trans('admin.show'),
				'balancewithdrawals' => $balancewithdrawals,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$balancewithdrawals = BalanceWithdrawal::find($id);
		return is_null($balancewithdrawals) || empty($balancewithdrawals)?
		backWithError(trans("admin.undefinedRecord"), aurl("balancewithdrawals")):
		view('admin.balancewithdrawals.edit', [
				'title'              => trans('admin.edit'),
				'balancewithdrawals' => $balancewithdrawals,
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
		foreach (array_keys((new BalanceWithdrawalsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(BalanceWithdrawalsRequest $request, $id) {
		// Check Record Exists
		$balancewithdrawals = BalanceWithdrawal::find($id);
		if (is_null($balancewithdrawals) || empty($balancewithdrawals)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("balancewithdrawals"));
		}
		$data             = $this->updateFillableColumns();
		$data['admin_id'] = admin()->id();
		if (request()->hasFile('transfer_picture')) {
			it()        ->delete($balancewithdrawals->transfer_picture);
			$data['transfer_picture'] = it()->upload('transfer_picture', 'balancewithdrawals');
		}
		BalanceWithdrawal::where('id', $id)->update($data);

		if (request('withdrawal_status') == 'approved' && $balancewithdrawals->withdrawal_status != 'approved') {
			$this->updateBalance(request('user_id'), request('amount'));
		}

		$balancewithdrawals = BalanceWithdrawal::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $balancewithdrawals,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$balancewithdrawals = BalanceWithdrawal::find($id);
		if (is_null($balancewithdrawals) || empty($balancewithdrawals)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("balancewithdrawals"));
		}
		if (!empty($balancewithdrawals->transfer_picture)) {
			it()                         ->delete($balancewithdrawals->transfer_picture);}

		it()->delete('balancewithdrawal', $id);
		$balancewithdrawals->delete();
		return redirectWithSuccess(aurl("balancewithdrawals"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$balancewithdrawals = BalanceWithdrawal::find($id);
				if (is_null($balancewithdrawals) || empty($balancewithdrawals)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("balancewithdrawals"));
				}
				if (!empty($balancewithdrawals->transfer_picture)) {
					it()                         ->delete($balancewithdrawals->transfer_picture);
				}
				it()->delete('balancewithdrawal', $id);
				$balancewithdrawals->delete();
			}
			return redirectWithSuccess(aurl("balancewithdrawals"), trans('admin.deleted'));
		} else {
			$balancewithdrawals = BalanceWithdrawal::find($data);
			if (is_null($balancewithdrawals) || empty($balancewithdrawals)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("balancewithdrawals"));
			}

			if (!empty($balancewithdrawals->transfer_picture)) {
				it()                         ->delete($balancewithdrawals->transfer_picture);
			}it()->delete('balancewithdrawal', $data);
			$balancewithdrawals->delete();
			return redirectWithSuccess(aurl("balancewithdrawals"), trans('admin.deleted'));
		}
	}

}