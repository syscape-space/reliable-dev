<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\OrderOffer;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\OrderOffersRequest;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class OrderOffersApi extends Controller
{
    protected $selectColumns = [
        "id",
        "vendor_id",
        "vendor_comment",
        "price",
        "execution_time",
        "offer_status",
        "requester_rate",
        "requester_feedback",
        "feedback_requester_status_by_admin",
        "user_offer_objected_status",
        "user_offer_objected_endat",
        "user_offer_rate",
        "user_offer_comment",
        "feedback_user_offer_status_by_admin",
        "requester_objected_status",
        "requester_objected_endat",
        "created_at"
    ];

    /**
     * Display the specified releationshop.
     * Baboon Api Script By [it v 1.6.37]
     * @return array to assign with index & show methods
     */
    public function arrWith()
    {
        return ['vendor','vendor.country'];
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OrderOffer = OrderOffer::select($this->selectColumns)
            ->where(function ($q) {
                if (\request()->order_id)
                    $q->whereOrderId(\request()->order_id);
            })
            ->where( 'offer_status' , '=' , 'pending' )
            ->with($this->arrWith())
            ->orderBy("id", "desc")->paginate(15);
        return successResponseJson(["data" => $OrderOffer]);
    }

    public function checkIfThereApprovedOffers(Request $request , $order_id){
        $checking = OrderOffer::where('order_id' , '=' , $order_id)
                              ->where('offer_status' , '=' , 'approved')                        
                              ->get();
                              
        return successResponseJson(["checking" => $checking]);
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Store a newly created resource in storage. Api
     * @return \Illuminate\Http\Response
     */
    public function store(OrderOffersRequest $request)
    {
        $data = $request->except("_token");
        $data['vendor_id'] = auth('api')->id();
        $data['offer_status'] = "pending";
        $OrderOffer = OrderOffer::create($data);

        $OrderOffer = OrderOffer::with($this->arrWith())->find($OrderOffer->id, $this->selectColumns);
        return successResponseJson([
            "message" => trans("admin.added"),
            "data" => $OrderOffer
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
        $OrderOffer = OrderOffer::with($this->arrWith())->find($id, $this->selectColumns);
        if (is_null($OrderOffer) || empty($OrderOffer)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }

        return successResponseJson([
            "data" => $OrderOffer
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
        foreach (array_keys((new OrderOffersRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
        }
        return $fillableCols;
    }

    public function update(OrderOffersRequest $request, $id)
    {
        $OrderOffer = OrderOffer::find($id);
        if (is_null($OrderOffer) || empty($OrderOffer)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }

        $data = $this->updateFillableColumns();

        OrderOffer::where("id", $id)->update($data);

        $OrderOffer = OrderOffer::with($this->arrWith())->find($id, $this->selectColumns);
        return successResponseJson([
            "message" => trans("admin.updated"),
            "data" => $OrderOffer
        ]);
    }

    /**
     * Baboon Api Script By [it v 1.6.37]
     * destroy a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderoffers = OrderOffer::find($id);
        if (is_null($orderoffers) || empty($orderoffers)) {
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);
        }


        it()->delete("orderoffer", $id);

        $orderoffers->delete();
        return successResponseJson([
            "message" => trans("admin.deleted")
        ]);
    }


    public function multi_delete()
    {
        $data = request("selected_data");
        if (is_array($data)) {
            foreach ($data as $id) {
                $orderoffers = OrderOffer::find($id);
                if (is_null($orderoffers) || empty($orderoffers)) {
                    return errorResponseJson([
                        "message" => trans("admin.undefinedRecord")
                    ]);
                }

                it()->delete("orderoffer", $id);
                $orderoffers->delete();
            }
            return successResponseJson([
                "message" => trans("admin.deleted")
            ]);
        } else {
            $orderoffers = OrderOffer::find($data);
            if (is_null($orderoffers) || empty($orderoffers)) {
                return errorResponseJson([
                    "message" => trans("admin.undefinedRecord")
                ]);
            }

            it()->delete("orderoffer", $data);

            $orderoffers->delete();
            return successResponseJson([
                "message" => trans("admin.deleted")
            ]);
        }
    }


    // Delete Files From Dropzone Library
    public function delete_file()
    {
        if (request("type_file") && request("type_id")) {
            if (it()->getFile(request("type_file"), request("type_id"))) {
                it()->delete(null, null, request("id"));
                return successResponseJson([]);
            }
        }
    }

    // Multi upload with dropzone
    public function multi_upload()
    {
        $rules = [];
        if (request()->hasFile("dz_offer")) {
            $rules["dz_offer"] = "sometimes|nullable|file";
        }


        $this->validate(request(), $rules, [], [
            "dz_offer" => trans("admin.dz_offer"),

        ]);

        if (request()->hasFile("dz_offer")) {
            it()->upload("dz_offer", request("dz_path"), "orderoffers", request("dz_id"));
        }

        return successResponseJson([
            "type" => request("dz_type"),
            "file" => it()->getFile("orderoffers", request("dz_id")),
        ]);
    }
}