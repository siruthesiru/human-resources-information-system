<style>
  
  .filled{
    font-size:125%; 
    /* font-weight:bolder; */
  }

  label.faded{
    opacity: 40%;
    font-size: 100%;
    font-weight: normal;
  }

  ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    opacity: 40%;
    font-size: 75%;
    font-weight: normal;
  }
  ::-moz-placeholder { /* Firefox 19+ */
    opacity: 40%;
    font-size: 75%;
    font-weight: normal;
  }
  :-ms-input-placeholder { /* IE 10+ */
    opacity: 40%;
    font-size: 75%;
    font-weight: normal;
  }
  :-moz-placeholder { /* Firefox 18- */
    opacity: 40%;
    font-size: 75%;
    font-weight: normal;
  }
</style>


<div class="fade modal" id="empEditModal_{{$employee->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content container-fluid">

      <div class="modal-header">
        <h3 class="modal-title" id="empAddModalLabel">EDITING <b>{{strtoupper($employee->fName.' '.$employee->lName)}}'s</b> RECORDS</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      {!! Form::open(['action' => ['App\Http\Controllers\EmployeesController@update', $employee->id], 'method' => 'POST', 'id' => 'editForm']) !!}
      {{-- {!! Form::open(['url' => '/employees'], ['files' => 'true']) !!} --}}
      <div class="modal-body">

        <div class="row">
          <div class="col-lg-4">

            <div class="row g-2">

              {{--image preview--}}

              {{-- <p>
                <input type="hidden" name="MAX_UPLOAD_SIZE" value="250000">
                <input type="file" name="jimage" id="jimage" accept="image/jpeg" required>
                <img id="uploadedimage" width="80%" src/>
              </p>
              <p>
                  <span id="imageerror" style="font-weight: bold; color: red"></span>
              </p> --}}
              <p>
                <img src="/images/what.jpg" width="80%" alt="WHAT" class="img-fluid img-thumbnail" >
              </p>

              {{Form::file('image')}}

              <br>
              <br>

            </div>

          </div>

          <div class="col-xl-8">

            <div class="row g-2">
                
                <h3>Personal Information</h3>
                <div class="col-xl-4 form-floating">
                  
                  {{Form::text('fName', $employee->fName, ['class' => 'form-control filled', 'placeholder' => 'First Name', 'id' => 'floatingFirst'])}}
                  <label class="faded" for="floatingFirst">First Name</label>
                </div>

                <div class="col-xl-4 form-floating">
                  
                  {{Form::text('mName', $employee->mName, ['class' => 'form-control filled', 'placeholder' => 'Middle Name', 'id' => 'floatingMiddle'])}}
                  <label class="faded" for="floatingMiddle">Middle Name</label>
                </div>

                <div class="col-xl-4 form-floating">
                  
                  {{Form::text('lName', $employee->lName, ['class' => 'form-control filled', 'placeholder' => 'Last Name', 'id' => 'floatingLast'])}}
                  <label class="faded" for="floatingLast">Last Name</label>
                </div>

            </div>

            <br>

            <div class="row g-3">

              <div class="col-lg-6 form-floating" style="margin-right:0px">
                  
                {{Form::text('address', $employee->address, ['class' => 'form-control filled', 'placeholder' => 'Address', 'id' => 'floatingAddress'])}}
                <label class="faded" for="floatingAddress">Address</label>
              </div>

              <div class="col-lg-2" style="font-size: 100%; max-height: 58px;">
  
                <div class="dropdown">
                  {{Form::select('sex', ['M' => 'Male', 'F' => 'Female'], $employee->sex, ['class' => 'btn btn-light btn-outline-grey dropdown-toggle filled border', 'type' => 'button', 'style' => 'height: 58px'])}}
                </div>
                
            </div>

              <div class="col-lg-4">
                
                {{Form::date('bDate', $employee->bDate, ['class' => 'form-control filled', 'placeholder' => 'First Name', 'style' => 'height: 58px;'])}}
              </div>

              

                <div class="col-lg input-group" style="height: 58px">
                    
                  <span class="input-group-text" id="countryCode">+63</span>
                  {{Form::text('contactNum1', $employee->contactNum1, ['class' => 'form-control filled', 'placeholder' => 'Contact Number 1','aria-describedby' => 'countryCode'])}}

                </div>

                <div class="col-lg input-group" style="height: 58px">
                    
                  <span class="input-group-text" id="countryCode">+63</span>
                  {{Form::text('contactNum2', $employee->contactNum2, ['class' => 'form-control filled', 'placeholder' => 'Contact Number 2','aria-describedby' => 'countryCode'])}}

                </div>
                
            </div>

          </div>

        </div>

        <hr style="color:gray">
          <br>

          <h3>Employment Information</h3>
        
        <div class="row g-2">
          {{-- <div class="col-xl-3 form-floating">
                  
            {{Form::text('company_id', $employee->empInfo->company_id, ['class' => 'form-control filled', 'placeholder' => 'First Name', 'id' => 'floatingFirst','required'])}}
            <label for="floatingFirst">Company ID</label>
          </div> --}}
          {{-- <div class="invalid-tooltip">
            Please choose a unique and valid username.
          </div>

          <div class="col-xl-4 form-floating">
            
            {{Form::text('mName', '', ['class' => 'form-control filled', 'placeholder' => 'Middle Name', 'id' => 'floatingMiddle'])}}
            <label for="floatingFirst">Middle Name</label>
          </div>

          <div class="col-xl-4 form-floating">
            
            {{Form::text('lName', '', ['class' => 'form-control filled', 'placeholder' => 'Last Name', 'id' => 'floatingLast','required'])}}
            <label for="floatingFirst">Last Name</label>
          </div> --}}
        </div>
          
          
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary reset-btn" data-bs-dismiss="modal">Cancel</button>
        {{-- <button type="button" class="btn btn-success">Add</button> --}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save Changes', ['class' => 'btn btn-success', 'onclick' => 'return confirm("Are you sure?")'])}}
      </div>

      {!! Form::close() !!}

    </div>
  </div>

 
</div>