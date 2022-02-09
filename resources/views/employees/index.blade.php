@extends('layouts.app')

@section('content')

<div>

    <div class="row">
       
        <h1 class="bold">EMPLOYEES</h1>
        <h6>Displaying all employees of PLAS Engineering and Enterprises</h6>
        
        <hr>

        <div class="col-auto">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#empAddModal" style="margin-bottom: 10px; margin-right: 5px">Add New Employee</button>
        </div>

        @include('employees.empAddModal')
        
        @include('layouts.filter')

    </div>

    <div>
        <div class="col-3mx-auto pull-right">
            <div class="">
                <form action="{{ route('employees.index') }}" method="GET" role="search">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search employees">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search employees" id="term">
                        <a href="{{ route('employees.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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