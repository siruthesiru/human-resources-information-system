@extends('layouts.app')

@section('content')


<h1>DASHBOARD</h1>

<div class="row g-4" style="min-height: 70vh">
        <div class="col-lg-3">
                <div class="p-3 border bg-light" style="min-height: 100%">
                                <h3>Summary of Employees</h3>

                                <hr>

                                <h5>Total: {{ $employees->count() }}</h5>

                                <hr>
                                
                                {{-- <h6>Accounting: {{$employees->where('department', 'Accounting')->count()}}</h6>
                                <h6>Engineering: {{$employees->where('department', 'Engineering')->count()}}</h6>
                                <h6>Human Resources: {{$employees->where('department', 'Human Resources')->count()}}</h6> --}}

                                <hr>


                                
                
                </div>
        </div>
        <div class="col-lg-6">
                <div class="p-3 border bg-light" style="min-height: 100%">
                        <h3>Notifications</h3>
                        <h6 style="opacity: 50%">Nothing to display...</h6>
                </div>
        </div>

        <div class="col-lg-3">
                <div class="p-3 border bg-light" style="min-height:48.7%; margin-bottom:5%">
                        <h3>Reassigned Location</h3>
                        <h6 style="opacity: 50%">Nothing to display...<h6>
                </div>

                <div class="p-3 border bg-light" style="min-height: 48.8%">
                        <h3>Birthdays for {{now()->format('F')}}</h3>

                        @foreach ($employees->take(100) as $employee)
                                <p>{{App\Http\Controllers\DashboardController::getUpcomingBirthdays($employee)}}</p>
                        @endforeach

                </div>
        </div>
        
</div>

@endsection