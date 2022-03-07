<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\TicketsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\TicketsRequest;
use App\Models\Ticket;
use App\Models\TicketReplay;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Tickets extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:tickets_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:tickets_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:tickets_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:tickets_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(TicketsDataTable $tickets) {
		return $tickets->render('admin.tickets.index', ['title' => trans('admin.tickets')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$temp_id = (time()*rand(0000, 9999));
		if (empty(request("temp_id")) || !request()->has("temp_id")) {
			return redirect(aurl("tickets/create?temp_id=".$temp_id));
		}

		return view('admin.tickets.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(TicketsRequest $request) {
		$data = $request->except("_token", "_method");

		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id   = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);

		$tickets = Ticket::create($data);

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("tickets", $dz_id, $tickets->id);
		}

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $tickets,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$temp_id = (time()*rand(0000, 9999));
		if (empty(request("temp_id")) || !request()->has("temp_id")) {
			return redirect(aurl("tickets/".$id."?temp_id=".$temp_id));
		}

		$tickets = Ticket::find($id);
		TicketReplay::where('seen_status', 'unseen')
			->where('ticket_id', $id)
			->where('user_id', '>', 0)
			->update([
				'seen_status' => 'seen',
			]);
		return is_null($tickets) || empty($tickets)?
		backWithError(trans("admin.undefinedRecord"), aurl("tickets")):
		view('admin.tickets.show', [
				'title'   => trans('admin.show').' - '.$tickets->ticket_title,
				'tickets' => $tickets,
				'replays' => $tickets->replays()->orderBy('id', 'desc')->paginate(15),
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$tickets = Ticket::find($id);
		return is_null($tickets) || empty($tickets)?
		backWithError(trans("admin.undefinedRecord"), aurl("tickets")):
		view('admin.tickets.edit', [
				'title'   => trans('admin.edit'),
				'tickets' => $tickets,
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
		foreach (array_keys((new TicketsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(TicketsRequest $request, $id) {
		// Check Record Exists
		$tickets = Ticket::find($id);
		if (is_null($tickets) || empty($tickets)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("tickets"));
		}
		$data = $this->updateFillableColumns();
		Ticket::where('id', $id)->update($data);

		$tickets = Ticket::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $tickets,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$tickets = Ticket::find($id);
		if (is_null($tickets) || empty($tickets)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("tickets"));
		}

		it()->delete($id, 'tickets');
		$this->deleteRaplys($id);
		$tickets->delete();
		return redirectWithSuccess(aurl("tickets"), trans('admin.deleted'));
	}

	public function delete_replay($id) {
		$replay = TicketReplay::find($id);
		if (!empty($replay)) {
			it()->delete($id, 'ticket_replays');
			$replay->delete();
		}
		return backWithSuccess(trans('admin.deleted'));
	}
	public function deleteRaplys($id) {
		foreach (TicketReplay::where('ticket_id', $id)->get() as $replay) {
			it()                                         ->delete($replay->id, 'ticket_replays');
			$replay->delete();
		}
	}
	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$tickets = Ticket::find($id);
				if (is_null($tickets) || empty($tickets)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("tickets"));
				}

				it()->delete($id, 'tickets');
				$this->deleteRaplys($id);
				$tickets->delete();
			}
			return redirectWithSuccess(aurl("tickets"), trans('admin.deleted'));
		} else {
			$tickets = Ticket::find($data);
			if (is_null($tickets) || empty($tickets)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("tickets"));
			}

			it()->delete($data, 'ticket');
			$this->deleteRaplys($data);
			$tickets->delete();
			return redirectWithSuccess(aurl("tickets"), trans('admin.deleted'));
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
			if (request()->hasFile("ticket_dz")) {
				$rules["ticket_dz"] = "sometimes|nullable|file";
			}
			if (request()->hasFile("ticket_replay_dz")) {
				$rules["ticket_replay_dz"] = "sometimes|nullable|file";
			}

			$this->validate(request(), $rules, [], [
					"ticket_dz"        => trans("admin.ticket_dz"),
					"ticket_replay_dz" => trans("admin.ticket_replay_dz"),

				]);
			$get_file = '';
			if (request()->hasFile("ticket_dz")) {
				it()        ->upload("ticket_dz", request("dz_path"), "tickets", request("dz_id"));
				$get_file = 'tickets';
			}

			if (request()->hasFile("ticket_replay_dz")) {
				it()        ->upload("ticket_replay_dz", request("dz_path"), "ticket_replays", request("dz_id"));
				$get_file = 'ticket_replays';
			}

			return response([
					"status" => true,
					"type"   => request("dz_type"),
					"file"   => it()->getFile($get_file, request("dz_id")),
				], 200);
		}

	}

	public function replay_comment($id) {
		$this->validate(request(), [
				'replay' => 'required|string',
			], [], [
				'replay' => trans('admin.replay_ticket'),
			]);

		$replay = TicketReplay::create([
				'ticket_id'   => $id,
				'admin_id'    => admin()->id(),
				'replay'      => request('replay'),
				'seen_status' => 'unseen',
			]);

		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id   = request("dz_id");

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("ticket_replays", $dz_id, $replay->id);
		}

		if (!empty(request('close_ticket')) && request('close_ticket') == 'yes') {
			Ticket::where('id', $id)->update([
					'ticket_status' => 'closed',
				]);
		}

		$content = view('admin.tickets.replay', [
				'tickets' => Ticket::find($id),
				'replay'  => TicketReplay::find($replay->id),
			])                                     ->render();

		return $content;
	}

}