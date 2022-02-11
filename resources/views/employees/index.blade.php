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

        <div class="col-sm">
            <input class="btn-check" type="checkbox" data-bs-toggle="collapse" id="btn-check-outlined" autocomplete="off" data-bs-target="#collapseFilter">
            <label class="btn btn-outline-secondary" for="btn-check-outlined" style="margin-bottom: 10px">Filters</label><br>
        </div>
        
        <div class="col-sm-3 justify-content-end">
            <form action="{{ route('employees.index') }}" method="GET" role="search">
        
                <div class="input-group">
                    <button class="btn bg-success" type="submit" title="Search employees">
                        <span class=""><img src="/assets/bootstrap-icons/search.svg" alt="View" width="100%" height="100%"></span>
                    </button>
        
                    <input type="text" class="form-control border-dark" name="term" placeholder="Search employees" id="term" style="margin-right:5px">
        
                    <a href="{{ route('employees.index') }}">
                        <button class="btn btn-danger border-dark" type="button" title="Refresh page">
                            <span class=""><img src="/assets/bootstrap-icons/x-circle.svg" alt="View" width="100%" height="100%"></span>
                        </button>
                    </a>
        
                </div>
            </form>
        </div>

        
        
        @include('layouts.filter')

    </div>

    <br>

    @include('employees.empAddModal')

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap" id="sortTable" style="vertical-align: middle">
            <thead class="table-dark" style="font-size: 90%">
                
                <tr>
                    
                    {{-- <th>ID #</th> --}}
                    <th>Last Name</th>
                    <th>First Name</th>
                    {{-- <th>Position 1</th>
                    <th>Position 2</th>
                    <th>Position 3</th>
                    <th>Department</th>
                    <th>Employment</th> --}}
                    <th>Location</th>
                    <th>Bdate</th>
                    <th>Contact #</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>

                
                
                @if(count($employees) > 0)

                    @foreach($employees as $employee)
                        <tr>

                            {{-- <td>{{$employee->emp_id}}</td> --}}
                            <td>{{$employee->lName}}</td>
                            <td>{{$employee->fName}}</td>
                            {{-- <td>{{$employee->position1}}</td>
                            <td>{{$employee->position2}}</td>
                            <td>{{$employee->position3}}</td>
                            <td>{{$employee->department}}</td>
                            <td>{{$employee->employmentStatus}}</td> --}}
                            <td>{{ \Illuminate\Support\Str::limit($employee->address, 20, $end='...') }}</td>
                            <td>{{$employee->bDate}}</td>
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