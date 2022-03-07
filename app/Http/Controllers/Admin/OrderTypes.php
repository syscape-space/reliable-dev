<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\OrderTypesDataTable;
use Carbon\Carbon;
use App\Models\OrderType;

use App\Http\Controllers\Validations\OrderTypesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class OrderTypes extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:ordertypes_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:ordertypes_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:ordertypes_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:ordertypes_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(OrderTypesDataTable $ordertypes)
            {
               return $ordertypes->render('admin.ordertypes.index',['title'=>trans('admin.ordertypes')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.ordertypes.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(OrderTypesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['type_icon'] = "";
$data['admin_id'] = admin()->id(); 
		  		$ordertypes = OrderType::create($data); 
               if(request()->hasFile('type_icon')){
              $ordertypes->type_icon = it()->upload('type_icon','ordertypes/'.$ordertypes->id);
              $ordertypes->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $ordertypes,
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
        		$ordertypes =  OrderType::find($id);
        		return is_null($ordertypes) || empty($ordertypes)?
        		backWithError(trans("admin.undefinedRecord"),aurl("ordertypes")) :
        		view('admin.ordertypes.show',[
				    'title'=>trans('admin.show'),
					'ordertypes'=>$ordertypes
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$ordertypes =  OrderType::find($id);
        		return is_null($ordertypes) || empty($ordertypes)?
        		backWithError(trans("admin.undefinedRecord"),aurl("ordertypes")) :
        		view('admin.ordertypes.edit',[
				  'title'=>trans('admin.edit'),
				  'ordertypes'=>$ordertypes
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
				foreach (array_keys((new OrderTypesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(OrderTypesRequest $request,$id)
            {
              // Check Record Exists
              $ordertypes =  OrderType::find($id);
              if(is_null($ordertypes) || empty($ordertypes)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("ordertypes"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
               if(request()->hasFile('type_icon')){
              it()->delete($ordertypes->type_icon);
              $data['type_icon'] = it()->upload('type_icon','ordertypes');
               } 
              OrderType::where('id',$id)->update($data);

              $ordertypes = OrderType::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $ordertypes,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$ordertypes = OrderType::find($id);
		if(is_null($ordertypes) || empty($ordertypes)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("ordertypes"));
		}
               		if(!empty($ordertypes->type_icon)){
			it()->delete($ordertypes->type_icon);		}

		it()->delete('ordertype',$id);
		$ordertypes->delete();
		return redirectWithSuccess(aurl("ordertypes"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$ordertypes = OrderType::find($id);
				if(is_null($ordertypes) || empty($ordertypes)){
					return backWithError(trans('admin.undefinedRecord'),aurl("ordertypes"));
				}
                    					if(!empty($ordertypes->type_icon)){
				  it()->delete($ordertypes->type_icon);
				}
				it()->delete('ordertype',$id);
				$ordertypes->delete();
			}
			return redirectWithSuccess(aurl("ordertypes"),trans('admin.deleted'));
		}else {
			$ordertypes = OrderType::find($data);
			if(is_null($ordertypes) || empty($ordertypes)){
				return backWithError(trans('admin.undefinedRecord'),aurl("ordertypes"));
			}
                    
			if(!empty($ordertypes->type_icon)){
			 it()->delete($ordertypes->type_icon);
			}			it()->delete('ordertype',$data);
			$ordertypes->delete();
			return redirectWithSuccess(aurl("ordertypes"),trans('admin.deleted'));
		}
	}
            

}