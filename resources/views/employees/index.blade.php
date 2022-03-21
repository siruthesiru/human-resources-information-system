@extends('layouts.app')

@section('content')

<div>
    @php
    use App\Models\Department;
    use App\Models\Branch;
    use App\Models\Position;
    use App\Models\EmploymentStatus;

    $departments = App\Models\Department::all();
    $branches = App\Models\Branch::all();
    $positions = App\Models\Position::all();
    $statuses = App\Models\EmploymentStatus::all();
    @endphp

    <div class="row g-3">
       
        <h1 class="bold">EMPLOYEES</h1>
        <h6>Displaying all employees of PLAS Engineering and Enterprises</h6>
        
        <hr>

        <div class="col-sm-auto">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#empAddModal" style="margin-bottom: 10px;">Add New Employee</button>
        </div>
        
        @include('layouts.filter')

    </div>

    <br>

    @include('employees.empAddModal')

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap" id="sortTable" style="vertical-align: middle">
            <thead class="table-dark" style="font-size: 90%">
                
                <tr>
                    
                    <th>ID #</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Position 1</th>
                    <th>Department</th>
                    <th>Branch</th>
                    <th>Employment</th>
                    <th>Contact #</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>

                
                
                @if(count($employees) > 0)

                    @foreach($employees as $employee)
                        <tr>

                            <td>{{$employee->empInfo->company_id}}</td>
                            <td>{{$employee->lName}}</td>
                            <td>{{$employee->fName}}</td>
                            <td>{{$employee->empInfo->position1}}</td>
                            <td>{{$employee->department}}</td>
                            <td>{{$employee->branch}}</td>
                            <td>{{$employee->empInfo->status}}</td>
                            <td>{{$employee->contactNum1}}</td>

                            <td class="align-middle">
                                <button type="button" class="btn btn-outline-dark btn-light" data-bs-toggle="modal" data-bs-target="#empViewModal_{{$employee->id}}" style="font-size:75%; margin-right: 5px"><img src="/assets/bootstrap-icons/eye-fill.svg" alt="View" width="100%" height="100%"></i>
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#empEditModal_{{$employee->id}}" style="font-size:75%"><img src="/assets/bootstrap-icons/pencil-square.svg" alt="View" width="100%" height="100%"></button>
                                
                                @include('employees.empViewModal')
                                @include('employees.empEditModal')

                                {{-- <button type="button" class="btn btn-danger" style="font-size:75%">Delete</button> --}}
                            </td>
                        
                        </tr>
                        
                    @endforeach
                    {{$employees->links()}}
                    
                    
                @endif
                            
                
            </tbody>
        </table>
    </div>
</div>
    
    @include('tools.empModalListener')

@endsection