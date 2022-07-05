<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee as ModelsEmployee;
use App\Models\Department as ModelsDepartment;
use App\Models\Branch as ModelsBranch;

use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Concat;

use Illuminate\Support\Facades\Response;
use App\Images;
use Image;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return ModelsEmployee::all();

        if( ModelsEmployee::all() != NULL){
            $employees = ModelsEmployee::where([
                ['id', '!=', NULL],
                [function($query) use ($request) {

                    if ($term = $request->term) {
                        $query->orWhere('fName', 'LIKE', '%'.$term.'%')->get();
                        $query->orWhere('lName', 'LIKE', '%'.$term.'%')->get();
                        $query->orWhere('mName', 'LIKE', '%'.$term.'%')->get();
                    }
                },
                ]
            ])
                ->orderBy('lName')
                ->paginate(25);
        }

        // dd($employees);

        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */

    public function store(Request $request)
    {
        $this -> validate($request, [
            'fName' => 'required',
            'lName' => 'required',
            'bDate' => 'required',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'contactNum1' => 'required',
            'department' => 'required',
            'branch' => 'required',
            'company_id' => 'required',
            'position1' => 'required',
            'empStatus' => 'required',
            'hired_on' => 'required',
        ]);

        $departments = ModelsDepartment::all();
        $branches = ModelsBranch::all();

//        if ($request->hasFile('photo')) {
//            $image      = $request->file('photo');
//            $fileName   = time() . '.' . $image->getClientOriginalExtension();
//
//            $img = $image->getRealPath();
//
//            dd();
//            Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');
//        }

        $employee = new ModelsEmployee;

        $employee->fName = $request->input('fName');
        $employee->mName = $request->input('mName');
        $employee->lName = $request->input('lName');
        $employee->bDate = $request->input('bDate');
        $employee->sex = $request->input('sex');
        $employee->street = $request->input('street');
        $employee->city = $request->input('city');
        $employee->province = $request->input('province');
        $employee->contactNum1 = $request->input('contactNum1');
        $employee->contactNum2 = $request->input('contactNum2');
        $employee->profilePicSrc = $request->input('profilePicSrc');
        $employee->department = $departments[$request->input('department')]->name;
        $employee->branch = $branches[$request->input('branch')]->name;

        $matchThese = ['fName' => $employee->fName, 'lName' => $employee->lName];

        $employee->save();

        $employeeID = ModelsEmployee::where($matchThese)->first();

        EmploymentInfosController::store($request, $employeeID->id);
        EmergencyContactsController::store($request, $employeeID->id);
        FinancialRecordsController::store($request, $employeeID->id);
        AttainmentsController::store($request , $employeeID->id);

        ChangeLogsController::addEmp($request, $employeeID->id);

        return redirect('/employees')->with('success', 'Employee Added!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
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
        $employee->profilePicSrc = $request->input('profilePicSrc');

        $employee->save();

        return redirect('/employees')->with('success', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function add()
//    {
//
//    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//
//    }
}
