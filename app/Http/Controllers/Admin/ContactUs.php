<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ContactUsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\ContactUsRequest;
use App\Mail\ReplayContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.36]
// Copyright Reserved  [it v 1.6.36]

class ContactUs extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:contactus_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:contactus_add', [
				'only' => ['create', 'store'],
			]);
		$this->middleware('AdminRole:contactus_edit', [
				'only' => ['edit', 'update'],
			]);
		$this->middleware('AdminRole:contactus_delete', [
				'only' => ['destroy', 'multi_delete'],
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index(ContactUsDataTable $contactus) {
		return $contactus->render('admin.contactus.index', ['title' => trans('admin.contactus')]);
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return back();
		return view('admin.contactus.create', ['title' => trans('admin.create')]);
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response Or Redirect
	 */
	public function store(ContactUsRequest $request) {
		return back();
		$data             = $request->except("_token", "_method");
		$data['admin_id'] = admin()->id();
		$contactus        = Contact::create($data);

		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $contactus,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Script By [it v 1.6.36]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$contactus       = Contact::find($id);
		$contactus->seen = 'yes';
		$contactus->save();
		return is_null($contactus) || empty($contactus)?
		backWithError(trans("admin.undefinedRecord"), aurl("contactus")):
		view('admin.contactus.show', [
				'title'     => trans('admin.show'),
				'contactus' => $contactus,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * edit the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$contactus = Contact::find($id);
		return is_null($contactus) || empty($contactus)?
		backWithError(trans("admin.undefinedRecord"), aurl("contactus")):
		view('admin.contactus.edit', [
				'title'     => trans('admin.edit'),
				'contactus' => $contactus,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * update a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function updateFillableColumns() {
		$fillableCols = [];
		foreach (array_keys((new ContactUsRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(ContactUsRequest $request, $id) {
		// Check Record Exists
		$contactus = Contact::find($id);
		if (is_null($contactus) || empty($contactus)) {
			return backWithError(trans("admin.undefinedRecord"), aurl("contactus"));
		}
		$data             = $this->updateFillableColumns();
		$data['admin_id'] = admin()->id();
		Contact::where('id', $id)->update($data);

		$contactus = Contact::find($id);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $contactus,
			]);
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * destroy a newly created resource in storage.
	 * @param  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$contactus = Contact::find($id);
		if (is_null($contactus) || empty($contactus)) {
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("contactus"));
		}

		it()->delete('contact', $id);
		$contactus->delete();
		return redirectWithSuccess(aurl("contactus"), trans('admin.deleted'));
	}

	public function multi_delete() {
		$data = request('selected_data');
		if (is_array($data)) {
			foreach ($data as $id) {
				$contactus = Contact::find($id);
				if (is_null($contactus) || empty($contactus)) {
					return backWithError(trans('admin.undefinedRecord'), aurl("contactus"));
				}

				it()->delete('contact', $id);
				$contactus->delete();
			}
			return redirectWithSuccess(aurl("contactus"), trans('admin.deleted'));
		} else {
			$contactus = Contact::find($data);
			if (is_null($contactus) || empty($contactus)) {
				return backWithError(trans('admin.undefinedRecord'), aurl("contactus"));
			}

			it()->delete('contact', $data);
			$contactus->delete();
			return redirectWithSuccess(aurl("contactus"), trans('admin.deleted'));
		}
	}

	public function replay_msg($id) {
		$rules = [
			'replay_content' => 'required',
		];
		$data = $this->validate(request(), $rules, [], [
				'replay_content' => trans('admin.replay_content'),
			]);

		$content                 = Contact::find($id);
		$content->replay_content = request('replay_content');
		$content->replay_by      = admin()->user()->id;
		$content->seen           = 'yes';
		$content->save();

		$data2                = [];
		$data2['orginal_msg'] = $content;

		$sendmail = Mail::to($data2['orginal_msg']->email)->send(new ReplayContact(['data' => $data2]));
		return redirectWithSuccess(aurl('contactus/'.$id), trans('admin.replay_content_sent_msg'));

	}

}