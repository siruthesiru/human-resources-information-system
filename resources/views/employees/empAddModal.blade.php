{{-- @php 
  use \App\Http\Controllers\EmployeesController;
@endphp --}}

<style>
    br{
      -webkit-user-select: none; /* Safari */        
      -moz-user-select: none; /* Firefox */
      -ms-user-select: none; /* IE10+/Edge */
      user-select: none; /* Standard */
    }

    label{
      color: grey;
    }

    .hidden{
      display:none;
    }

</style>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<div class="fade modal" id="empAddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content container-fluid">

        <div class="modal-header">
          <h3 class="modal-title" id="empAddModalLabel">ADD NEW EMPLOYEE</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        {!! Form::open(['class' => 'needs-validation','action' => 'App\Http\Controllers\EmployeesController@store', 'method' => 'POST', 'novalidate']) !!}
        <div class="modal-body">

          <div class="row">
            <div class="col-xl-3 g-2 col-centered">

              <div class="row p-1">

                <p class="p-1 border" style="height:228px; width:228px; margin-top:34px; margin-left:20px" id="surroundImage">
                  
                  <img class="img-fluid img-thumbnail hidden" id="frame" src="" style="width:228%; max-height:228%;"/>

                </p>

                <h5 style="margin-left: 10px; margin-top: 4px">Profile Picture</h5>

              </div>

              <div class="row p-3">

                

                <p>
                  
                  <input type="file" onchange="preview()" name="profilePicSrc">

                </p>

                <br>
                <br>

              </div>

            </div>
  
            <div class="col-xl">
  
              <div class="row g-2" style="margin-bottom: 8px">
                  
                  <h3>Personal Information</h3>
                  <div class="col-xl-4 form-floating">
                    
                    {{Form::text('fName', '', ['class' => 'form-control filled', 'placeholder' => 'First Name', 'id' => 'floatingFirst','required'])}}
                    <label for="floatingFirst">First Name</label>
                  </div>
  
                  <div class="col-xl-4 form-floating">
                    
                    {{Form::text('mName', '', ['class' => 'form-control filled', 'placeholder' => 'Middle Name', 'id' => 'floatingMiddle'])}}
                    <label for="floatingFirst">Middle Name (Optional)</label>
                  </div>
  
                  <div class="col-xl-4 form-floating">
                    
                    {{Form::text('lName', '', ['class' => 'form-control filled', 'placeholder' => 'Last Name', 'id' => 'floatingLast','required'])}}
                    <label for="floatingFirst">Last Name</label>
                  </div>
  
              </div>

              <br>
  
              <div class="row g-2">
  
                <div class="col-lg-7 form-floating" style="margin-right:0px">
                    
                  {{Form::text('address', '', ['class' => 'form-control filled', 'placeholder' => 'Address', 'id' => 'floatingAddress', 'required'])}}
                  <label for="floatingAddress">Address</label>
                </div>

                <div class="col-lg-2" style="max-height: 58px; margin-right: 10px">
  
                  <div class="dropdown">
                    {{Form::select('sex', ['' => 'Sex', 'M' => 'Male', 'F' => 'Female'], 0, ['class' => 'form-select', 'type' => 'button', 'style' => 'height: 58px', 'required'])}}
                  </div>
                    
                </div>

                <div class="col-lg-auto border bg-light" style="font-size: 92%; max-height: 58px; border-radius: 5px; max-width: 98%;">
  
                  Birth Date:
                  <div class="row-auto">
                    {{Form::date('bDate', 'Birthday', ['class' => 'form-control', 'placeholder' => 'Birthday', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'left', 'id' => 'bDay', 'required', 'style' => 'border: none;'])}}
                  </div>
                    
                </div>
                  
              </div>

              <br>

              <div class="row g-2">
                <div class="col-lg input-group" style="height: 58px">
                      
                  <span class="input-group-text">+63</span>
                  {{Form::text('contactNum1', '', ['class' => 'form-control', 'placeholder' => 'Primary Contact #','aria-describedby' => 'countryCode', 'style' => 'font-size: 18px','maxlength' => '10', 'required'])}}

                </div>

                <div class="col-lg input-group" style="height: 58px">
                    
                  <span class="input-group-text">+63</span>
                  {{Form::text('contactNum2', '', ['class' => 'form-control', 'placeholder' => 'Secondary Contact # (Optional)','aria-describedby' => 'countryCode', 'style' => 'font-size: 18px', 'maxlength' => '10'])}}

                </div>
              </div>


              <div class="row g-2" style="margin-bottom: 8px; margin-top: 10px">
                  
                <h5>Emergency Contact</h5>
                <div class="col-lg form-floating">
                  
                  {{Form::text('emergencyContactName', '', ['class' => 'form-control filled', 'placeholder' => 'Emergency Contact Name', 'id' => 'floatingFirst'])}}
                  <label for="floatingFirst">Full Name of Emergency Contact</label>
                </div>

                <div class="col-lg input-group" style="height: 58px">
                      
                  <span class="input-group-text">+63</span>
                  {{Form::text('emergencyContactNum', '', ['class' => 'form-control', 'placeholder' => 'Emergency Contact #','aria-describedby' => 'countryCode', 'style' => 'font-size: 18px','maxlength' => '10'])}}

                </div>

              </div>
  
            </div>

          </div>

          <hr style="color:gray">
          <br>

          <h3>Employment Information</h3>

          <div class="row g-2">
            <div class="col-xl-3 form-floating">
                    
              {{Form::text('company_id', '', ['class' => 'form-control filled', 'placeholder' => 'First Name', 'id' => 'floatingFirst','required'])}}
              <label for="floatingFirst">Company ID</label>
            </div>
            
          </div>

          <br>

          <div class="row g-2">
            
            <div class="col-lg-3 border bg-light" style="font-size: 92%; max-height: 58px; border-radius: 5px; max-width: 95%; margin-left:3px;">
  
              Date Hired:
              <div class="row-auto">
                {{Form::date('hired_on', 'Date Hired', ['class' => 'form-control', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'left', 'id' => 'hDay', 'required', 'style' => 'border: none;'])}}
              </div>
                
            </div>

            <div class="dropdown col-lg-3">
              {{Form::select('empStatus', $statuses->pluck('type'),'', ['class' => 'form-select', 'placeholder' => 'Employment Status','type' => 'button', 'style' => 'height: 58px','required'])}}
            </div>

            
          </div>

          <br>

          <div class="row g-2">

            <div class="dropdown col-lg-3">
              {{Form::select('department', $departments->pluck('name'),'', ['class' => 'form-select', 'placeholder' => 'Department','type' => 'button', 'style' => 'height: 58px', 'required'])}}
            </div>

            <div class="dropdown col-lg-3">
              {{Form::select('branch', $branches->pluck('name'),'', ['class' => 'form-select', 'placeholder' => 'Branch','type' => 'button', 'style' => 'height: 58px','required'])}}
            </div>
            
          </div>

          <br>

          <div class="row g-2">

            <h5>Assignment</h5>

            <div class="dropdown col-lg-3">
              {{Form::select('position1', $positions->pluck('name'),'', ['class' => 'form-select', 'placeholder' => 'Main Role','type' => 'button', 'style' => 'height: 58px', 'required'])}}
            </div>

            <div class="dropdown col-lg-3">
              {{Form::select('position2', $positions->pluck('name'),'', ['class' => 'form-select', 'placeholder' => 'Other Role (optional)','type' => 'button', 'style' => 'height: 58px'])}}
            </div>

            <div class="dropdown col-lg-3">
              {{Form::select('position3', $positions->pluck('name'),'', ['class' => 'form-select', 'placeholder' => 'Other Role (optional)','type' => 'button', 'style' => 'height: 58px'])}}
            </div>
          </div>

          <br>

          <div class="row g-2">

            <div class="col-lg-6 form-floating" style="margin-right:0px">
                    
              {{Form::text('location', '', ['class' => 'form-control filled', 'placeholder' => 'Current Location', 'id' => 'floatingAddress', 'required'])}}
              <label for="floatingAddress">Current Location</label>
            </div>

            
          </div>
            
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closer">Close</button>
          {{-- <button type="button" class="btn btn-success">Add</button> --}}
          {{Form::submit('Add', ['class' => 'btn btn-success'])}}
        </div>

        {!! Form::close() !!}

      </div>
    </div>

    
    {{--image preview--}}

    <script>

      function preview() {
        surroundImage.classList.remove("border");
        frame.classList.remove("hidden");
        frame.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>

    @include('tools.formValidation')

    
</div>