<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SubscriptionFeesDataTable;
use Carbon\Carbon;
use App\Models\SubscriptionFee;

use App\Http\Controllers\Validations\SubscriptionFeesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class SubscriptionFees extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:subscriptionfees_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:subscriptionfees_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:subscriptionfees_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:subscriptionfees_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SubscriptionFeesDataTable $subscriptionfees)
            {
               return $subscriptionfees->render('admin.subscriptionfees.index',['title'=>trans('admin.subscriptionfees')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.subscriptionfees.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SubscriptionFeesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
		  		$subscriptionfees = SubscriptionFee::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $subscriptionfees,
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
        		$subscriptionfees =  SubscriptionFee::find($id);
        		return is_null($subscriptionfees) || empty($subscriptionfees)?
        		backWithError(trans("admin.undefinedRecord"),aurl("subscriptionfees")) :
        		view('admin.subscriptionfees.show',[
				    'title'=>trans('admin.show'),
					'subscriptionfees'=>$subscriptionfees
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$subscriptionfees =  SubscriptionFee::find($id);
        		return is_null($subscriptionfees) || empty($subscriptionfees)?
        		backWithError(trans("admin.undefinedRecord"),aurl("subscriptionfees")) :
        		view('admin.subscriptionfees.edit',[
				  'title'=>trans('admin.edit'),
				  'subscriptionfees'=>$subscriptionfees
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
				foreach (array_keys((new SubscriptionFeesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SubscriptionFeesRequest $request,$id)
            {
              // Check Record Exists
              $subscriptionfees =  SubscriptionFee::find($id);
              if(is_null($subscriptionfees) || empty($subscriptionfees)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("subscriptionfees"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              SubscriptionFee::where('id',$id)->update($data);

              $subscriptionfees = SubscriptionFee::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $subscriptionfees,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$subscriptionfees = SubscriptionFee::find($id);
		if(is_null($subscriptionfees) || empty($subscriptionfees)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("subscriptionfees"));
		}
               
		it()->delete('subscriptionfee',$id);
		$subscriptionfees->delete();
		return redirectWithSuccess(aurl("subscriptionfees"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$subscriptionfees = SubscriptionFee::find($id);
				if(is_null($subscriptionfees) || empty($subscriptionfees)){
					return backWithError(trans('admin.undefinedRecord'),aurl("subscriptionfees"));
				}
                    	
				it()->delete('subscriptionfee',$id);
				$subscriptionfees->delete();
			}
			return redirectWithSuccess(aurl("subscriptionfees"),trans('admin.deleted'));
		}else {
			$subscriptionfees = SubscriptionFee::find($data);
			if(is_null($subscriptionfees) || empty($subscriptionfees)){
				return backWithError(trans('admin.undefinedRecord'),aurl("subscriptionfees"));
			}
                    
			it()->delete('subscriptionfee',$data);
			$subscriptionfees->delete();
			return redirectWithSuccess(aurl("subscriptionfees"),trans('admin.deleted'));
		}
	}
            

}