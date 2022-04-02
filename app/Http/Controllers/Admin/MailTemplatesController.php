<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailTemplates;
use Illuminate\Http\Request;

class MailTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates=MailTemplates::all();
		return view('admin.mail_templates.index', ['title' => 'قوالب البريد','templates'=>$templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mail_templates.create', ['title' => 'إضافة قالب بريد']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'title' => 'required|string',
			'content' => 'required|string',
		],[
			'title.required' => 'يرجى ادخال عنوان القالب',
			'content.required' => 'يرجى ادخال محتوى القالب',
		]);
		MailTemplates::create($request->all());
		return redirectWithSuccess(aurl('mail-templates'), trans('admin.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailTemplates  $mailTemplates
     * @return \Illuminate\Http\Response
     */
    public function show(MailTemplates $mailTemplates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailTemplates  $mailTemplates
     * @return \Illuminate\Http\Response
     */
    public function edit(MailTemplates $mailTemplate)
    {
        return view('admin.mail_templates.edit', ['title' => 'تعديل قالب بريد','mailTemplate'=>$mailTemplate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailTemplates  $mailTemplates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailTemplates $mailTemplate)
    {
        $request->validate([
			'title' => 'required|string',
			'content' => 'required|string',
		],[
			'title.required' => 'يرجى ادخال عنوان القالب',
			'content.required' => 'يرجى ادخال محتوى القالب',
		]);
		$mailTemplate->update($request->all());
		return redirectWithSuccess(aurl('mail-templates'), trans('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailTemplates  $mailTemplates
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailTemplates $mailTemplate)
    {
        $mailTemplate->delete();
        return redirectWithSuccess(aurl('mail-templates'), trans('admin.deleted'));
    }
}
