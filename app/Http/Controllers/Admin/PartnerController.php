<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\PartnerDataTable;
use App\Models\Partner;
use Illuminate\Http\Request;
use Str;


class PartnerController extends Controller
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

    public function index(PartnerDataTable $partner)
    {
        return $partner->render('admin.partners.index',['title'=>trans('admin.partners')]);
    }

    public function create()
    {
        $data = [
            'title'=>trans('admin.create')
        ];
        return view('admin.partners.create', $data);
    }

    public function store(Request $request)
    {
        // dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
        $data = $request->validate([
            'name' => 'required|max:255|unique:partners',
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:20000',
            'link' => 'sometimes|nullable'
        ]);

        // $request->file('logo')->move();

        if($request->hasFile('logo')){
            $file = request()->file('logo');
            $fileMime = $file->getClientOriginalExtension();
            $fileUrl = Str::random(16) . ".$fileMime";
            request()->file('logo')->move('partners', $fileUrl);
            $data['logo'] = $fileUrl;
        }

        $partner = Partner::create($data);

        return successResponseJson([
            "message" => trans("admin.added"),
            "data" => $partner,
        ]);
    }

    public function show($id)
    {
        $partner = Partner::find($id);
        return is_null($partner) || empty($partner) ?
        backWithError(trans("admin.undefinedRecord"), aurl("partners")) :
        view('admin.partners.show',[
            'title' => trans('admin.show'),
            'partner' => $partner
        ]);
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        return is_null($partner) || empty($partner)?
        backWithError(trans("admin.undefinedRecord"), aurl("partners")) :
        view('admin.partners.edit',[
            'title' => trans('admin.edit'),
            'partner' => $partner
        ]);
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        $data = $request->validate([
            'name' => 'required|max:255|unique:partners,id,' . $id,
            'logo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:20000',
            'link' => 'sometimes|nullable'
        ]);
        
        if(is_null($partner) || empty($partner)){
            return backWithError(trans("admin.undefinedRecord"), aurl("partners"));
        }

        if($request->hasFile('logo')){
            if(file_exists(public_path('partners/' . $partner->logo)))
                unlink(public_path('partners/' . $partner->logo));
            $file = request()->file('logo');
            $fileMime = $file->getClientOriginalExtension();
            $fileUrl = Str::random(16) . ".$fileMime";
            request()->file('logo')->move('partners', $fileUrl);
            $data['logo'] = $fileUrl;
        }

        // if (request()->hasFile('logo')) {
		// 	it()->delete($partner->logo);
		// 	$data['logo'] = it()->upload('logo', 'partners');
		// }

        Partner::where('id', $id)->update($data);
        $partner = Partner::find($id);

        return successResponseJson([
            "message" => trans("admin.updated"),
            "data" => $partner,
        ]);
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
		if(is_null($partner) || empty($partner)){
			return backWithSuccess(trans('admin.undefinedRecord'), aurl("partners"));
		}
		// it()->delete('partner', $id);
        if(file_exists(public_path('partners/' . $partner->logo)))
            unlink(public_path('partners/' . $partner->logo));

		$partner->delete();
		return redirectWithSuccess(aurl("partners"), trans('admin.deleted'));
    }

    public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$partner = Partner::find($id);

				if(is_null($partner) || empty($partner)){
					return backWithError(trans('admin.undefinedRecord'), aurl("partners"));
				}

				// it()->delete('career', $id);
                if(file_exists(public_path('partners/' . $partner->logo)))
                    unlink(public_path('partners/' . $partner->logo));
				$partner->delete();
			}
			return redirectWithSuccess(aurl("partners"),trans('admin.deleted'));
		}else {
			$partner = Partner::find($data);
			if(is_null($partner) || empty($partner)){
				return backWithError(trans('admin.undefinedRecord'),aurl("partners"));
			}

			// it()->delete('partner', $data);
            if(file_exists(public_path('partners/' . $partner->logo)))
                unlink(public_path('partners/' . $partner->logo));
			$partner->delete();
			return redirectWithSuccess(aurl("partners"),trans('admin.deleted'));
		}
	}
}
