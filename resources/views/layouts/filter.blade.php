<div class="col-sm">
    <input class="btn-check" type="checkbox" data-bs-toggle="collapse" id="btn-check-outlined" autocomplete="off" data-bs-target="#collapseFilter">
    <label class="btn btn-outline-secondary" for="btn-check-outlined" style="margin-bottom: 10px">Filters</label><br>
</div>

<div class="col-md-3 justify-content-end">
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

<div class="collapsing" id="collapseFilter" style="font-size: 90%">
    <div class="card card-body">
        <div class="row g-2" style="margin-left: 10px; margin-right: 10px">
            <div class="col-md-4">
                <h5>By Branch</h5>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filter_accounting">
                                <label class="form-check-label" for="filter_accounting">
                                    Accounting
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filter_engineering">
                                <label class="form-check-label" for="filter_engineering">
                                    Engineering
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filter_engineering">
                                <label class="form-check-label" for="filter_engineering">
                                    Human Resources
                                </label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filter_accounting">
                                <label class="form-check-label" for="filter_accounting">
                                    Accounting
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filter_engineering">
                                <label class="form-check-label" for="filter_engineering">
                                    Engineering
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filter_engineering">
                                <label class="form-check-label" for="filter_engineering">
                                    Human Resources
                                </label>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="col-md-4 p-2">
                <h5>By Department</h5>
            </div>
            <div class="col-md-4 p-2">
                <h5>Displayed Information</h5>
            </div>
        </div>
    </div>
</div>