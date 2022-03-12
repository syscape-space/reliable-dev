<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserCommercial;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\UserCommercialsRequest;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UserCommercialsApi extends Controller
{
    protected $selectColumns = [
        "id",
        "commercial_id",
        "commercial_file",
        "commercial_end_at",
        "user_id",
        "comment",
    ];

    /**
     * Display the specified releationshop.
     * Baboon Api Script By [it v 1.6.37]
     * @return array to assign with index & show methods
     */
    public function arrWith()
    {
        return ['user_id',];
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserCommercial = UserCommercial::select($this->selectColumns)->with($this->arrWith())->orderBy("id", "desc")->paginate(15);
        return successResponseJson(["data" => $UserCommercial]);
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Store a newly created resource in storage. Api
     * @return \Illuminate\Http\Response
     */
    public function store(UserCommercialsRequest $request)
    {
        $data = $request->except("_token");

        $data["commercial_file"] = "";
        $UserCommercial = UserCommercial::create($data);
        if (request()->hasFile("commercial_file")) {
            $UserCommercial->commercial_file = it()->upload("commercial_file", "usercommercials/" . $UserCommercial->id);
            $UserCommercial->save();
        }

        $UserCommercial = UserCommercial::with($this->arrWith())->find($UserCommercial->id, $this->selectColumns);
        return successResponseJson([
            "message" => trans("admin.added"),
            "data" => $UserCommercial
        ]);
    }


    /**
     * Display the specified resource.
     * Baboon Api Script By [it v 1.6.37]
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $UserCommercial = UserCommercial::with($this->arrWith())->find($id, $this->selectColumns);
        if (is_null($UserCommercial) || empty($UserCommercial)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }

        return successResponseJson([
            "data" => $UserCommercial
        ]);;
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * update a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function updateFillableColumns()
    {
        $fillableCols = [];
        foreach (array_keys((new UserCommercialsRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
        }
        return $fillableCols;
    }

    public function update(UserCommercialsRequest $request, $id)
    {
        $UserCommercial = UserCommercial::find($id);
        if (is_null($UserCommercial) || empty($UserCommercial)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }

        $data = $this->updateFillableColumns();

        if (request()->hasFile("commercial_file")) {
            it()->delete($UserCommercial->commercial_file);
            $data["commercial_file"] = it()->upload("commercial_file", "usercommercials/" . $UserCommercial->id);
        }
        UserCommercial::where("id", $id)->update($data);

        $UserCommercial = UserCommercial::with($this->arrWith())->find($id, $this->selectColumns);
        return successResponseJson([
            "message" => trans("admin.updated"),
            "data" => $UserCommercial
        ]);
    }

    /**
     * Baboon Api Script By [it v 1.6.37]
     * destroy a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usercommercials = UserCommercial::find($id);
        if (is_null($usercommercials) || empty($usercommercials)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }


        if (!empty($usercommercials->commercial_file)) {
            it()->delete($usercommercials->commercial_file);
        }
        it()->delete("usercommercial", $id);

        $usercommercials->delete();
        return successResponseJson([
            "message" => trans("admin.deleted")
        ]);
    }


    public function multi_delete()
    {
        $data = request("selected_data");
        if (is_array($data)) {
            foreach ($data as $id) {
                $usercommercials = UserCommercial::find($id);
                if (is_null($usercommercials) || empty($usercommercials)) {
                    return errorResponseJson([
                        "message" => trans("admin.undefinedRecord")
                    ]);
                }

                if (!empty($usercommercials->commercial_file)) {
                    it()->delete($usercommercials->commercial_file);
                }
                it()->delete("usercommercial", $id);
                $usercommercials->delete();
            }
            return successResponseJson([
                "message" => trans("admin.deleted")
            ]);
        } else {
            $usercommercials = UserCommercial::find($data);
            if (is_null($usercommercials) || empty($usercommercials)) {
                return errorResponseJson([
                    "message" => trans("admin.undefinedRecord")
                ]);
            }

            if (!empty($usercommercials->commercial_file)) {
                it()->delete($usercommercials->commercial_file);
            }
            it()->delete("usercommercial", $data);

            $usercommercials->delete();
            return successResponseJson([
                "message" => trans("admin.deleted")
            ]);
        }
    }


}