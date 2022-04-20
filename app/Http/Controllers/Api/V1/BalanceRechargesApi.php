<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BalanceRecharge;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\BalanceRechargesRequest;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class BalanceRechargesApi extends Controller
{
    protected $selectColumns = [
        "id",
        "user_id",
        "amount",
        "charge_by",
        "transfer_name",
        "operation_number",
        "bank_name",
        "transfer_image",
        "user_note",
        "charge_status",
        "reason",
        "system_notes",
    ];

    /**
     * Display the specified releationshop.
     * Baboon Api Script By [it v 1.6.38]
     * @return array to assign with index & show methods
     */
    public function arrWith()
    {
        return ['user_id',];
    }


    /**
     * Baboon Api Script By [it v 1.6.38]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BalanceRecharge = BalanceRecharge::select($this->selectColumns)->where('user_id',auth()->id())
            ->with($this->arrWith())->orderBy("id", "desc")->get()->append(['date']);
        return successResponseJson(["data" => $BalanceRecharge]);
    }


    /**
     * Baboon Api Script By [it v 1.6.38]
     * Store a newly created resource in storage. Api
     * @return \Illuminate\Http\Response
     */
    public function store(BalanceRechargesRequest $request)
    {
        $data = $request->except("_token");

        $data["user_id"] = auth()->id();
        $data["transfer_image"] = "";
        $BalanceRecharge = BalanceRecharge::create($data);
        if (request()->hasFile("transfer_image")) {
            $BalanceRecharge->transfer_image = it()->upload("transfer_image", "balancerecharges/" . $BalanceRecharge->id);
            $BalanceRecharge->save();
        }

        $BalanceRecharge = BalanceRecharge::with($this->arrWith())->find($BalanceRecharge->id, $this->selectColumns);
        return successResponseJson([
            "message" => trans("admin.added"),
            "data" => $BalanceRecharge
        ]);
    }


    /**
     * Display the specified resource.
     * Baboon Api Script By [it v 1.6.38]
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $BalanceRecharge = BalanceRecharge::with($this->arrWith())->find($id, $this->selectColumns);
        if (is_null($BalanceRecharge) || empty($BalanceRecharge)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }

        return successResponseJson([
            "data" => $BalanceRecharge
        ]);;
    }


    /**
     * Baboon Api Script By [it v 1.6.38]
     * update a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function updateFillableColumns()
    {
        $fillableCols = [];
        foreach (array_keys((new BalanceRechargesRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
        }
        return $fillableCols;
    }

    public function update(BalanceRechargesRequest $request, $id)
    {
        $BalanceRecharge = BalanceRecharge::find($id);
        if (is_null($BalanceRecharge) || empty($BalanceRecharge)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }

        $data = $this->updateFillableColumns();

        $data["user_id"] = auth()->id();
        if (request()->hasFile("transfer_image")) {
            it()->delete($BalanceRecharge->transfer_image);
            $data["transfer_image"] = it()->upload("transfer_image", "balancerecharges/" . $BalanceRecharge->id);
        }
        BalanceRecharge::where("id", $id)->update($data);

        $BalanceRecharge = BalanceRecharge::with($this->arrWith())->find($id, $this->selectColumns);
        return successResponseJson([
            "message" => trans("admin.updated"),
            "data" => $BalanceRecharge
        ]);
    }

    /**
     * Baboon Api Script By [it v 1.6.38]
     * destroy a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balancerecharges = BalanceRecharge::find($id);
        if (is_null($balancerecharges) || empty($balancerecharges)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }


        if (!empty($balancerecharges->transfer_image)) {
            it()->delete($balancerecharges->transfer_image);
        }
        it()->delete("balancerecharge", $id);

        $balancerecharges->delete();
        return successResponseJson([
            "message" => trans("admin.deleted")
        ]);
    }


    public function multi_delete()
    {
        $data = request("selected_data");
        if (is_array($data)) {
            foreach ($data as $id) {
                $balancerecharges = BalanceRecharge::find($id);
                if (is_null($balancerecharges) || empty($balancerecharges)) {
                    return errorResponseJson([
                        "message" => trans("admin.undefinedRecord")
                    ]);
                }

                if (!empty($balancerecharges->transfer_image)) {
                    it()->delete($balancerecharges->transfer_image);
                }
                it()->delete("balancerecharge", $id);
                $balancerecharges->delete();
            }
            return successResponseJson([
                "message" => trans("admin.deleted")
            ]);
        } else {
            $balancerecharges = BalanceRecharge::find($data);
            if (is_null($balancerecharges) || empty($balancerecharges)) {
                return errorResponseJson([
                    "message" => trans("admin.undefinedRecord")
                ]);
            }

            if (!empty($balancerecharges->transfer_image)) {
                it()->delete($balancerecharges->transfer_image);
            }
            it()->delete("balancerecharge", $data);

            $balancerecharges->delete();
            return successResponseJson([
                "message" => trans("admin.deleted")
            ]);
        }
    }


}