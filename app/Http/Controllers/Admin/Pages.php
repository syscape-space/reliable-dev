<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PagesDataTable;
use Carbon\Carbon;
use App\Models\Page;

use App\Http\Controllers\Validations\PagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Pages extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:pages_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:pages_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:pages_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:pages_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PagesDataTable $pages)
            {
               return $pages->render('admin.pages.index',['title'=>trans('admin.pages')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.pages.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(PagesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
		  		$pages = Page::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $pages,
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
        		$pages =  Page::find($id);
        		return is_null($pages) || empty($pages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("pages")) :
        		view('admin.pages.show',[
				    'title'=>trans('admin.show'),
					'pages'=>$pages
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$pages =  Page::find($id);
        		return is_null($pages) || empty($pages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("pages")) :
        		view('admin.pages.edit',[
				  'title'=>trans('admin.edit'),
				  'pages'=>$pages
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
				foreach (array_keys((new PagesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(PagesRequest $request,$id)
            {
              // Check Record Exists
              $pages =  Page::find($id);
              if(is_null($pages) || empty($pages)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("pages"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              Page::where('id',$id)->update($data);

              $pages = Page::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $pages,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$pages = Page::find($id);
		if(is_null($pages) || empty($pages)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("pages"));
		}
               
		it()->delete('page',$id);
		$pages->delete();
		return redirectWithSuccess(aurl("pages"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$pages = Page::find($id);
				if(is_null($pages) || empty($pages)){
					return backWithError(trans('admin.undefinedRecord'),aurl("pages"));
				}
                    	
				it()->delete('page',$id);
				$pages->delete();
			}
			return redirectWithSuccess(aurl("pages"),trans('admin.deleted'));
		}else {
			$pages = Page::find($data);
			if(is_null($pages) || empty($pages)){
				return backWithError(trans('admin.undefinedRecord'),aurl("pages"));
			}
                    
			it()->delete('page',$data);
			$pages->delete();
			return redirectWithSuccess(aurl("pages"),trans('admin.deleted'));
		}
	}
            

}