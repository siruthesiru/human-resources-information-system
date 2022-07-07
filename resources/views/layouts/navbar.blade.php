<style>
    body {
    min-height: 100vh;
    min-height: -webkit-fill-available;
  }

  html {
    height: -webkit-fill-available;
  }

  main {
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
  }

  /*.b-example-divider {*/
  /*  flex-shrink: 0;*/
  /*  width: 1.5rem;*/
  /*  height: 100vh;*/
  /*  background-color: rgba(0, 95, 29, 0.1);*/
  /*  border: solid rgba(0, 0, 0, .15);*/
  /*  border-width: 1px 0;*/
  /*  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);*/
  /*}*/

  /*.bi {*/
  /*  vertical-align: -.125em;*/
  /*  pointer-events: none;*/
  /*  fill: currentColor;*/
  /*}*/

  /*.dropdown-toggle { outline: 0; }*/

  /*.nav-flush .nav-link {*/
  /*  border-radius: 0;*/
  /*}*/

  /*.btn-toggle {*/
  /*  display: inline-flex;*/
  /*  align-items: center;*/
  /*  padding: .25rem .5rem;*/
  /*  font-weight: 600;*/
  /*  color: rgba(0, 0, 0, .65);*/
  /*  background-color: transparent;*/
  /*  border: 0;*/
  /*}*/
  /*.btn-toggle:hover,*/
  /*.btn-toggle:focus {*/
  /*  color: rgba(0, 0, 0, .85);*/
  /*  background-color: #d2f4ea;*/
  /*}*/

  /*.btn-toggle::before {*/
  /*  width: 1.25em;*/
  /*  line-height: 0;*/
  /*  content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");*/
  /*  transition: transform .35s ease;*/
  /*  transform-origin: .5em 50%;*/
  /*}*/

  /*.btn-toggle[aria-expanded="true"] {*/
  /*  color: rgba(0, 0, 0, .85);*/
  /*}*/
  /*.btn-toggle[aria-expanded="true"]::before {*/
  /*  transform: rotate(90deg);*/
  /*}*/

  /*.btn-toggle-nav a {*/
  /*  display: inline-flex;*/
  /*  padding: .1875rem .5rem;*/
  /*  margin-top: .125rem;*/
  /*  margin-left: 1.25rem;*/
  /*  text-decoration: none;*/
  /*}*/
  /*.btn-toggle-nav a:hover,*/
  /*.btn-toggle-nav a:focus {*/
  /*  background-color: #d2f4ea;*/
  /*}*/

  /*.scrollarea {*/
  /*  overflow-y: auto;*/
  /*}*/

  /*.fw-semibold { font-weight: 600; }*/
  /*.lh-tight { line-height: 1.25; }*/

  /*.bd-placeholder-img {*/
  /*  font-size: 1.125rem;*/
  /*  text-anchor: middle;*/
  /*  -webkit-user-select: none;*/
  /*  -moz-user-select: none;*/
  /*  user-select: none;*/
  /*}*/

  @media (min-width: 768px) {
    /*.bd-placeholder-img-lg {*/
    /*  font-size: 3.5rem;*/
    /*}*/
  }

  .nav-link{
    margin-left: 10px;
  }

  .dropdown-menu li{
    font-size: 16px;
  }
</style>

<link href="{{asset('css/app.css')}}" rel="stylesheet">

@php
  use App\Models\Department;
  use App\Models\Branch;

  $departments = App\Models\Department::orderBy('name', 'asc')->get();
  $branches = App\Models\Branch::orderBy('name', 'asc')->get();
@endphp

<nav class="navbar navbar-expand-xxl navbar-dark" aria-label="Third navbar example" style="position:fixed ; top: 0 ; width : 100%; z-index:5; background-color: #017f36">
  <div class="container-fluid">
    <a class="navbar-brand" href="/dashboard" style="font-weight: bold; font-size: 20px">Human Resources</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03" style="font-size: 16px">
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('employees') ? 'active' : '' }}" href="/employees">Employees</a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('department') ? 'active' : '' }}" href="#" id="dropdown03" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-hidden="">Departments</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown03" style="margin-top: 8px">

            @foreach ($departments as $department)

            <li><a class="dropdown-item" href="/departments/{{strtolower(str_replace(' ', '_', $department->name))}}">{{$department->name}}</a></li>

            @endforeach

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Branch/Location</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown04" style="margin-top: 8px">

            @foreach ($branches as $branch)

            <li><a class="dropdown-item" href="/branch/{{strtolower(str_replace(' ', '', $branch->name))}}">{{$branch->name}}</a></li>

            @endforeach

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logs">Logs</a>
        </li>
      </ul>
      <br>
    </div>
  </div>
</nav>

<div style="margin-top:9vh"></div>
