<?php

namespace App\Http\Controllers;

use App\Models\EmergencyContact;
use Illuminate\Http\Request;

class EmergencyContactsController extends Controller
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
    public static function store(Request $request, $id)
    {
        $empCont = new EmergencyContact;

        $empCont->emp_id = $id;
        $empCont->name = $request->input('emergencyContactName');
        $empCont->emergencyContact = $request->input('emergencyContactNum');
        // $table -> id();
        // $table -> unsignedbigInteger('emp_id');
        // $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        // $table -> bigInteger('company_id');
        // $table -> string('position1');
        // $table -> string('position2')->nullable();
        // $table -> string('position3')->nullable();
        // $table -> string('status');
        // $table -> date('hired_on');
        // $table -> string('current_location');
        // $table -> timestamps();

        $empCont->save();
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
