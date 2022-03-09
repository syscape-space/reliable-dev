<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\SupportMessagesDataTable;
use App\Models\{
    SupportMessage,
    Department
};
use Illuminate\Http\Request;


class SupportMessageController extends Controller
{

    public function __construct() {
		// $this->middleware('AdminRole:support_messages_show', [
		// 	'only' => ['index', 'show'],
		// ]);
		// $this->middleware('AdminRole:support_messages_add', [
		// 	'only' => ['create', 'store'],
		// ]);
		// $this->middleware('AdminRole:support_messages_edit', [
		// 	'only' => ['edit', 'update'],
		// ]);
		// $this->middleware('AdminRole:support_messages_delete', [
		// 	'only' => ['destroy', 'multi_delete'],
		// ]);
	}

    public function index(SupportMessagesDataTable $supportMessages)
    {
        return $supportMessages->render('admin.supportmessages.index',['title'=>trans('admin.supportmessages')]);
    }

    public function create()
    {
        $departments = Department::all()->pluck("department_name_" . app()->getLocale(), 'id');
        $data = [
            'departments' => $departments,
            'title'=>trans('admin.create')
        ];
        return view('admin.supportmessages.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'department_id' => 'required',
            'message_ar' => 'required|string',
            'message_en' => 'required|string'
        ]);

        $supportMessage = SupportMessage::create($data);

        return successResponseJson([
            "message" => trans("admin.added"),
            "data" => $supportMessage,
        ]);
    }

    public function show($id)
    {
        $supportMessage = SupportMessage::find($id);
        return is_null($supportMessage) || empty($supportMessage) ?
        backWithError(trans("admin.undefinedRecord"), aurl("supportmessages")) :
        view('admin.supportmessages.show',[
            'title' => trans('admin.show'),
            'supportmessage' => $supportMessage
        ]);
    }

    public function edit($id)
    {
        $supportmessage = SupportMessage::find($id);
        $departments = Department::all()->pluck("department_name_" . app()->getLocale(), 'id');
        return is_null($supportmessage) || empty($supportmessage)?
        backWithError(trans("admin.undefinedRecord"), aurl("supportmessages")) :
        view('admin.supportmessages.edit',[
            'title' => trans('admin.edit'),
            'supportmessage' => $supportmessage,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, $id)
    {
        $supportMessage = SupportMessage::find($id);
        $data = $request->validate([
            'department_id' => 'required',
            'message_ar' => 'required|string',
            'message_en' => 'required|string'
        ]);
        if(is_null($supportMessage) || empty($supportMessage)){
            return backWithError(trans("admin.undefinedRecord"),aurl("supportmessages"));
        }

        SupportMessage::where('id',$id)->update($data);
        $supportMessage = SupportMessage::find($id);

        return successResponseJson([
            "message" => trans("admin.updated"),
            "data" => $supportMessage,
        ]);
    }

    public function destroy($id)
    {
        $supportMessage = SupportMessage::find($id);
		if(is_null($supportMessage) || empty($supportMessage)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("supportmessages"));
		}
		it()->delete('systemmessage', $id);
		$supportMessage->delete();
		return redirectWithSuccess(aurl("supportmessages"), trans('admin.deleted'));
    }

    public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$supportmessage = SupportMessage::find($id);

				if(is_null($supportmessage) || empty($supportmessage)){
					return backWithError(trans('admin.undefinedRecord'), aurl("supportmessages"));
				}
                    	
				it()->delete('supportmessage', $id);
				$supportmessage->delete();
			}
			return redirectWithSuccess(aurl("supportmessages"),trans('admin.deleted'));
		}else {
			$supportmessage = SupportMessage::find($data);
			if(is_null($supportmessage) || empty($supportmessage)){
				return backWithError(trans('admin.undefinedRecord'),aurl("supportmessages"));
			}
                    
			it()->delete('systemmessage',$data);
			$supportmessage->delete();
			return redirectWithSuccess(aurl("supportmessages"),trans('admin.deleted'));
		}
	}
}
