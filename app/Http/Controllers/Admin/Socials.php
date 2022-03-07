<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SocialsDataTable;
use Carbon\Carbon;
use App\Models\Social;

use App\Http\Controllers\Validations\SocialsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Socials extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:socials_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:socials_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:socials_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:socials_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SocialsDataTable $socials)
            {
               return $socials->render('admin.socials.index',['title'=>trans('admin.socials')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.socials.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SocialsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['social_icon'] = "";
$data['admin_id'] = admin()->id(); 
		  		$socials = Social::create($data); 
               if(request()->hasFile('social_icon')){
              $socials->social_icon = it()->upload('social_icon','socials/'.$socials->id);
              $socials->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $socials,
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
        		$socials =  Social::find($id);
        		return is_null($socials) || empty($socials)?
        		backWithError(trans("admin.undefinedRecord"),aurl("socials")) :
        		view('admin.socials.show',[
				    'title'=>trans('admin.show'),
					'socials'=>$socials
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$socials =  Social::find($id);
        		return is_null($socials) || empty($socials)?
        		backWithError(trans("admin.undefinedRecord"),aurl("socials")) :
        		view('admin.socials.edit',[
				  'title'=>trans('admin.edit'),
				  'socials'=>$socials
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
				foreach (array_keys((new SocialsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SocialsRequest $request,$id)
            {
              // Check Record Exists
              $socials =  Social::find($id);
              if(is_null($socials) || empty($socials)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("socials"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
               if(request()->hasFile('social_icon')){
              it()->delete($socials->social_icon);
              $data['social_icon'] = it()->upload('social_icon','socials');
               } 
              Social::where('id',$id)->update($data);

              $socials = Social::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $socials,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$socials = Social::find($id);
		if(is_null($socials) || empty($socials)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("socials"));
		}
               		if(!empty($socials->social_icon)){
			it()->delete($socials->social_icon);		}

		it()->delete('social',$id);
		$socials->delete();
		return redirectWithSuccess(aurl("socials"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$socials = Social::find($id);
				if(is_null($socials) || empty($socials)){
					return backWithError(trans('admin.undefinedRecord'),aurl("socials"));
				}
                    					if(!empty($socials->social_icon)){
				  it()->delete($socials->social_icon);
				}
				it()->delete('social',$id);
				$socials->delete();
			}
			return redirectWithSuccess(aurl("socials"),trans('admin.deleted'));
		}else {
			$socials = Social::find($data);
			if(is_null($socials) || empty($socials)){
				return backWithError(trans('admin.undefinedRecord'),aurl("socials"));
			}
                    
			if(!empty($socials->social_icon)){
			 it()->delete($socials->social_icon);
			}			it()->delete('social',$data);
			$socials->delete();
			return redirectWithSuccess(aurl("socials"),trans('admin.deleted'));
		}
	}
            

}