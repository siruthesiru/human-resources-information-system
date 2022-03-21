<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attainment;


class AttainmentsController extends Controller
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
        $attainment = new Attainment();
        
        $attainment->emp_id = $id;
        $attainment->type = $request->input('attainment1');
        $attainment->title = $request->input('attainmentTitle1');
        $attainment->description = $request->input('attainmentDesc1');
        $attainment->attained_on = $request->input('attained_on1');

        $attainment->save();

        if($request->input('attainment2') != NULL){
            $attainment = new Attainment();
        
            $attainment->emp_id = $id;
            $attainment->type = $request->input('attainment2');
            $attainment->title = $request->input('attainmentTitle2');
            $attainment->description = $request->input('attainmentDesc2');
            $attainment->attained_on = $request->input('attained_on2');

            $attainment->save();
        }

        if($request->input('attainment3') != NULL){
            $attainment = new Attainment();
        
            $attainment->emp_id = $id;
            $attainment->type = $request->input('attainment3');
            $attainment->title = $request->input('attainmentTitle3');
            $attainment->description = $request->input('attainmentDesc3');
            $attainment->attained_on = $request->input('attained_on3');

            $attainment->save();
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
