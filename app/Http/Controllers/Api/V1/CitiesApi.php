<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\City;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CitiesApi extends Controller {
	protected $selectColumns = [
		"id",
		"city_name_ar",
		"city_name_en",
		"country_id",
	];

	/**
	 * Display the specified releationshop.
	 * Baboon Api Script By [it v 1.6.37]
	 * @return array to assign with index & show methods
	 */
	public function arrWith() {
		return ['country_id'];
	}

	/**
	 * Baboon Api Script By [it v 1.6.37]
	 * Display a listing of the resource. Api
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$City = City::select($this->selectColumns)->with($this->arrWith())
			->orderBy("id", "desc")	->paginate(15);

		return successResponseJson(["data" => $City]);
	}

}