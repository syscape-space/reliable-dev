<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\TicketDepartmentsDataTable;
use Carbon\Carbon;
use App\Models\TicketDepartment;

use App\Http\Controllers\Validations\TicketDepartmentsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class TicketDepartments extends Controller
{

	public function __construct()
	{

		$this->middleware('AdminRole:ticketdepartments_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:ticketdepartments_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:ticketdepartments_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:ticketdepartments_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(TicketDepartmentsDataTable $ticketdepartments)
	{
		return $ticketdepartments->render('admin.ticketdepartments.index', ['title' => trans('admin.ticketdepartments')]);
	}


	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		return view('admin.ticketdepartments.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(TicketDepartmentsRequest $request)
	{
		$data = $request->except("_token", "_method");
		$data['dep_icon'] = "";
		$data['admin_id'] = admin()->id();
		$ticketdepartments = TicketDepartment::create($data);
		if (request()->hasFile('dep_icon')) {
			$ticketdepartments->dep_icon = it()->upload('dep_icon', 'ticketdepartments/' . $ticketdepartments->id);
			$ticketdepartments->save();
		}

		return successResponseJson([
			"message" => trans("admin.added"),
			"data" => $ticketdepartments,
		]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$ticketdepartments =  TicketDepartment::find($id);
		return is_null($ticketdepartments) || empty($ticketdepartments) ?
			backWithError(trans("admin.undefinedRecord"), aurl("ticketdepartments")) :
			view('admin.ticketdepartments.show', [
				'title' => trans('admin.show'),
				'ticketdepartments' => $ticketdepartments
			]);
	}


	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$ticketdepartments =  TicketDepartment::find($id);
		return is_null($ticketdepartments) || empty($ticketdepartments) ?
			backWithError(trans("admin.undefinedRecord"), aurl("ticketdepartments")) :
			view('admin.ticketdepartments.edit', [
				'title' => trans('admin.edit'),
				'ticketdepartments' => $ticketdepartments
			]);
	}


	/**
	 * Baboon Script By [it v 1.6.37]
	 * update a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function updateFillableColumns()
	{
		$fillableCols = [];
		foreach (array_keys((new TicketDepartmentsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(TicketDepartmentsRequest $request, $id)
	{
		// Check Record Exists
		$ticketdepartments =  TicketDepartment::find($id);
		if (is_null($ticketdepartments) || empty($ticketdepartments)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("ticketdepartments"));
		}
		$data = $this->updateFillableColumns();
		$data['admin_id'] = admin()->id();
		if (request()->hasFile('dep_icon')) {
			it()->delete($ticketdepartments->dep_icon);
			$data['dep_icon'] = it()->upload('dep_icon', 'ticketdepartments');
		}
		TicketDepartment::where('id', $id)->update($data);

		$ticketdepartments = TicketDepartment::find($id);
		return successResponseJson([
			"message" => trans("admin.updated"),
			"data" => $ticketdepartments,
		]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$ticketdepartments = TicketDepartment::find($id);
		if (is_null($ticketdepartments) || empty($ticketdepartments)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("ticketdepartments"));
		}
		if (!empty($ticketdepartments->dep_icon)) {
			it()->delete($ticketdepartments->dep_icon);
		}

		it()->delete('ticketdepartment', $id);
		$ticketdepartments->delete();
		return redirectWithSuccess(aurl("ticketdepartments"), trans('admin.deleted'));
	}


	public function multi_delete()
	{
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$ticketdepartments = TicketDepartment::find($id);
				if (is_null($ticketdepartments) || empty($ticketdepartments)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("ticketdepartments"));
				}
				if (!empty($ticketdepartments->dep_icon)) {
					it()->delete($ticketdepartments->dep_icon);
				}
				it()->delete('ticketdepartment', $id);
				$ticketdepartments->delete();
			}
			return redirectWithSuccess(aurl("ticketdepartments"), trans('admin.deleted'));
		} else {
			$ticketdepartments = TicketDepartment::find($data);
			if (is_null($ticketdepartments) || empty($ticketdepartments)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("ticketdepartments"));
			}

			if (!empty($ticketdepartments->dep_icon)) {
				it()->delete($ticketdepartments->dep_icon);
			}
			it()->delete('ticketdepartment', $data);
			$ticketdepartments->delete();
			return redirectWithSuccess(aurl("ticketdepartments"), trans('admin.deleted'));
		}
	}
}
