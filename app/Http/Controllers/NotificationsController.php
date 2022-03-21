<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification as ModelsNotification;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $empInfo = new ModelsNotification();

        $empInfo->emp_id = $id;
        $empInfo->company_id = $request->input('company_id');
        $empInfo->position1 = $positions[$request->input('position1')]->name;
        $empInfo->position2 = isset($request['email']) ? $positions[$request->input('position2')]->name : NULL;
        $empInfo->position3 = isset($request['email']) ? $positions[$request->input('position3')]->name : NULL;
        $empInfo->status = $statuses[$request->input('empStatus')]->type;
        $empInfo->hired_on = $request->input('hired_on');
        $empInfo->current_location = $request->input('location');

        $empInfo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
