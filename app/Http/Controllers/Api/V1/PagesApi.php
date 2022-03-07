<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidationsApi\V1\PagesRequest;
use App\Models\Page;
use Illuminate\Http\Request;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class PagesApi extends Controller {
	protected $selectColumns = [
		"id",
		"page_name_ar",
		"page_content_ar",
		"page_name_en",
		"page_content_en",
	];

	/**
	 * Display the specified releationshop.
	 * Baboon Api Script By [it v 1.6.37]
	 * @return array to assign with index & show methods
	 */
	public function arrWith() {
		return [];
	}

	/**
	 * Baboon Api Script By [it v 1.6.37]
	 * Display a listing of the resource. Api
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$Page = Page::select($this->selectColumns)->with($this->arrWith())->orderBy("id", "desc")->paginate(15);
		return successResponseJson(["data" => $Page]);
	}

	/**
	 * Baboon Api Script By [it v 1.6.37]
	 * Store a newly created resource in storage. Api
	 * @return \Illuminate\Http\Response
	 */
	public function store(PagesRequest $request) {
		$data = $request->except("_token");

		$data["user_id"] = auth()->id();
		$Page            = Page::create($data);

		$Page = Page::with($this->arrWith())->find($Page->id, $this->selectColumns);
		return successResponseJson([
				"message" => trans("admin.added"),
				"data"    => $Page,
			]);
	}

	/**
	 * Display the specified resource.
	 * Baboon Api Script By [it v 1.6.37]
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$Page = Page::with($this->arrWith())->find($id, $this->selectColumns);
		if (is_null($Page) || empty($Page)) {
			return errorResponseJson([
					"message" => trans("admin.undefinedRecord"),
				]);
		}

		return successResponseJson([
				"data" => $Page,
			]);
	}

	/**
	 * Baboon Api Script By [it v 1.6.37]
	 * update a newly created resource in storage.
	 * @return \Illuminate\Http\Response
	 */
	public function updateFillableColumns() {
		$fillableCols = [];
		foreach (array_keys((new PagesRequest)->attributes()) as $fillableUpdate) {
			if (!is_null(request($fillableUpdate))) {
				$fillableCols[$fillableUpdate] = request($fillableUpdate);
			}
		}
		return $fillableCols;
	}

	public function update(PagesRequest $request, $id) {
		$Page = Page::find($id);
		if (is_null($Page) || empty($Page)) {
			return errorResponseJson([
					"message" => trans("admin.undefinedRecord"),
				]);
		}

		$data = $this->updateFillableColumns();

		$data["user_id"] = auth()->id();
		Page::where("id", $id)->update($data);

		$Page = Page::with($this->arrWith())->find($id, $this->selectColumns);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => $Page,
			]);
	}

	/**
	 * Baboon Api Script By [it v 1.6.37]
	 * destroy a newly created resource in storage.
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$pages = Page::find($id);
		if (is_null($pages) || empty($pages)) {
			return errorResponseJson([
					"message" => trans("admin.undefinedRecord"),
				]);
		}

		it()->delete("page", $id);

		$pages->delete();
		return successResponseJson([
				"message" => trans("admin.deleted"),
			]);
	}

	public function multi_delete() {
		$data = request("selected_data");
		if (is_array($data)) {
			foreach ($data as $id) {
				$pages = Page::find($id);
				if (is_null($pages) || empty($pages)) {
					return errorResponseJson([
							"message" => trans("admin.undefinedRecord"),
						]);
				}

				it()->delete("page", $id);
				$pages->delete();
			}
			return successResponseJson([
					"message" => trans("admin.deleted"),
				]);
		} else {
			$pages = Page::find($data);
			if (is_null($pages) || empty($pages)) {
				return errorResponseJson([
						"message" => trans("admin.undefinedRecord"),
					]);
			}

			it()->delete("page", $data);

			$pages->delete();
			return successResponseJson([
					"message" => trans("admin.deleted"),
				]);
		}
	}

}