<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord as ModelsFinancialRecord;

use Illuminate\Http\Request;

class FinancialRecordsController extends Controller
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
        $financialRec = new ModelsFinancialRecord;
        
        $financialRec->emp_id = $id;
        $financialRec->current_rate = $request->input('current_rate');
        $financialRec->previous_rate = $request->input('previous_rate');
        $financialRec->adjustment = $request->input('adjustment');
        $financialRec->current_loan = $request->input('current_loan');
        $financialRec->to_deduct = $request->input('current_loan');
        $financialRec->allowance = $request->input('allowance');

        $financialRec->save();

        RateLogsController::store($request , $id);
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
