<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Models\Employee as ModelsEmployee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return ModelsEmployee::all();
        // $employees = ModelsEmployee::where('department', 'Lakers')->get();
        // $employees = ModelsEmployee::orderBy('lName', 'asc')->paginate(25);

        $employees = ModelsEmployee::where([
            ['id', '!=', NULL],
            [function($query) use ($request) {
                if ($term = $request->term) {
                    $query->orWhere('fName', 'LIKE', '%'.$term.'%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->paginate(25);

        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'fName' => 'required',
            'lName' => 'required',
            'bDate' => 'required',
            'address' => 'required',
            'contactNum1' => 'required'
        ]);

        $employee = new ModelsEmployee();
        $employee->fName = $request->input('fName');
        $employee->mName = $request->input('mName');
        $employee->lName = $request->input('lName');
        $employee->bDate = $request->input('bDate');
        $employee->sex = $request->input('sex');
        $employee->address = $request->input('address');
        $employee->contactNum1 = $request->input('contactNum1');
        $employee->contactNum2 = $request->input('contactNum2');
        $employee->profilePicSrc = NULL;

        $employee->save();

        return redirect('/employees')->with('success', 'Employee Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($emp_id)
    {

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
        $this -> validate($request, [
            'fName' => 'required',
            'lName' => 'required',
            'bDate' => 'required',
            'address' => 'required',
            'contactNum1' => 'required'
        ]);

        $employee = ModelsEmployee::find($id);
        $employee->fName = $request->input('fName');
        $employee->mName = $request->input('mName');
        $employee->lName = $request->input('lName');
        $employee->bDate = $request->input('bDate');
        $employee->sex = $request->input('sex');
        $employee->address = $request->input('address');
        $employee->contactNum1 = $request->input('contactNum1');
        $employee->contactNum2 = $request->input('contactNum2');
        $employee->profilePicSrc = NULL;

        $employee->save();

        return redirect('/employees')->with('success', 'Employee Updated!');
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
