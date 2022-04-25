<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructions=Instruction::paginate(10);
        $title ='التعليمات';
        return view('admin.instructions.index',compact('instructions','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title=trans('admin.add');
        return view('admin.instructions.create',compact('title'));
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
            'name'=>'required|string',
            'content'=>'required|string'
        ]);
        Instruction::create($request->all());
        return redirectWithSuccess(aurl('instructions'), trans('admin.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function show(Instruction $instruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function edit(Instruction $instruction)
    {
        $title=trans('admin.edit');
        return view('admin.instructions.edit',compact('instruction','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruction $instruction)
    {
        $request->validate([
            'name'=>'required|string',
            'content'=>'required|string'
        ]);
        $instruction->update($request->all());
        return redirectWithSuccess(aurl('instructions'), trans('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruction $instruction)
    {
        $instruction->delete();
        return redirectWithSuccess(aurl('instructions'), trans('admin.deleted'));
    }
}
