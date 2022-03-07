<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\FAQsDataTable;
use Carbon\Carbon;
use App\Models\FAQ;

use App\Http\Controllers\Validations\FAQsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class FAQs extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:faqs_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:faqs_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:faqs_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:faqs_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(FAQsDataTable $faqs)
            {
               return $faqs->render('admin.faqs.index',['title'=>trans('admin.faqs')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.faqs.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(FAQsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
		  		$faqs = FAQ::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $faqs,
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
        		$faqs =  FAQ::find($id);
        		return is_null($faqs) || empty($faqs)?
        		backWithError(trans("admin.undefinedRecord"),aurl("faqs")) :
        		view('admin.faqs.show',[
				    'title'=>trans('admin.show'),
					'faqs'=>$faqs
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$faqs =  FAQ::find($id);
        		return is_null($faqs) || empty($faqs)?
        		backWithError(trans("admin.undefinedRecord"),aurl("faqs")) :
        		view('admin.faqs.edit',[
				  'title'=>trans('admin.edit'),
				  'faqs'=>$faqs
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
				foreach (array_keys((new FAQsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(FAQsRequest $request,$id)
            {
              // Check Record Exists
              $faqs =  FAQ::find($id);
              if(is_null($faqs) || empty($faqs)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("faqs"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              FAQ::where('id',$id)->update($data);

              $faqs = FAQ::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $faqs,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$faqs = FAQ::find($id);
		if(is_null($faqs) || empty($faqs)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("faqs"));
		}
               
		it()->delete('faq',$id);
		$faqs->delete();
		return redirectWithSuccess(aurl("faqs"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$faqs = FAQ::find($id);
				if(is_null($faqs) || empty($faqs)){
					return backWithError(trans('admin.undefinedRecord'),aurl("faqs"));
				}
                    	
				it()->delete('faq',$id);
				$faqs->delete();
			}
			return redirectWithSuccess(aurl("faqs"),trans('admin.deleted'));
		}else {
			$faqs = FAQ::find($data);
			if(is_null($faqs) || empty($faqs)){
				return backWithError(trans('admin.undefinedRecord'),aurl("faqs"));
			}
                    
			it()->delete('faq',$data);
			$faqs->delete();
			return redirectWithSuccess(aurl("faqs"),trans('admin.deleted'));
		}
	}
            

}