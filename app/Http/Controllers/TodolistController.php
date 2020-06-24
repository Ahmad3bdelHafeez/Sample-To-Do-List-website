<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests;
use App\Todolist;
use App\Http\Resources\Todolist as TodolistResource;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolist = Todolist::paginate(10);
        return TodolistResource::collection($todolist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todolist = $request->isMethod('put')? Todolist::
        findOrFail($request->todolist_id): new Todolist;
        $todolist->id=$request->input('todolist_id');
        $todolist->content=$request->input('content');
        $todolist->title=$request->input('title');
        $todolist->imagePath=$request->input('imagePath');
        $todolist->categoryName=$request->input('categoryName');

        if($todolist->save()){
            return new TodolistResource($todolist);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todolist = Todolist::findOrFail($id);
        return new TodolistResource($todolist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todolist = Todolist::findOrFail($id);
        if($todolist->delete()){
            return new TodolistResource($todolist);
        }
    }
}
