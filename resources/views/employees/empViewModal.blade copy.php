<style>
  br
    {
        -webkit-user-select: none; /* Safari */        
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+/Edge */
        user-select: none; /* Standard */
    }
</style>

<div class="fade modal" id="empViewModal_{{$employee->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content container-fluid">

      <div class="modal-header">
        <h3 class="modal-title" id="empAddModalLabel">EMPLOYEE PROFILE</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
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

              <br>
              <br>

            </div>

          </div>

          <div class="col-xl-8">

            <div class="row g-2">
                
                <h5>Personal Information</h5>
                <div class="col-xl-6 form-floating">

                  <table>
                    <tbody>

                      <tr>
                        <td>Name: </td>
                        <td>{{$employee->fName.' '.$employee->mName.' '.$employee->lName}}</td>
                      </tr>

                      @if ($employee->empInfo != NULL)
                        {{$employee->empInfo->company_id}}
                      
                        {{$employee->empInfo->position1}}
                      @endif

                    </tbody>
                  </table>
                  
                </div>

                <div class="col-xl-4 form-floating">
                  
                  {{Form::text('mName', '', ['class' => 'form-control', 'placeholder' => 'Middle Name', 'id' => 'floatingMiddle'])}}
                  <label for="floatingFirst">Middle Name</label>
                </div>

                <div class="col-xl-4 form-floating">
                  
                  {{Form::text('lName', '', ['class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'floatingLast'])}}
                  <label for="floatingFirst">Last Name</label>
                </div>

            </div>

            <br>

            <div class="row g-3">

              <div class="col-lg-7 form-floating" style="margin-right:0px">
                  
                {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address', 'id' => 'floatingAddress'])}}
                <label for="floatingAddress">Address</label>
              </div>

              <div class="col-lg-2 form-floating p-2 border bg-light rounded-1" style="font-size: 100%; max-height: 58px;">

                <div class="row-1">
                  {{Form::radio('sex', 'M', ['class' => 'form-control', 'placeholder' => 'Male', 'id' => 'radioMale'])}}
                  <label class="form-check-label" for="radioMale">
                    Male
                  </label>
                </div>
                
                  <div class="row-1">
                    {{Form::radio('sex', 'F', ['class' => 'form-control', 'placeholder' => 'Female', 'id' => 'radioFemale'])}}
                    <label class="form-check-label" for="radioFemale">
                      Female
                    </label>
                  </div>
                
              </div>

              <div class="col-lg-3">
                
                {{Form::date('bDate', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'First Name', 'style' => 'height: 58px;'])}}
              </div>

              

                <div class="col-lg input-group" style="height: 58px">
                    
                  <span class="input-group-text" id="countryCode">+63</span>
                  {{Form::text('contactNum1', '', ['class' => 'form-control', 'placeholder' => 'Contact Number 1','aria-describedby' => 'countryCode'])}}

                </div>

                <div class="col-lg input-group" style="height: 58px">
                    
                  <span class="input-group-text" id="countryCode">+63</span>
                  {{Form::text('contactNum2', '', ['class' => 'form-control', 'placeholder' => 'Contact Number 2','aria-describedby' => 'countryCode'])}}

                </div>
                
            </div>

          </div>

        </div>
          
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-success">Add</button> --}}
        {{-- {{Form::submit('Add', ['class' => 'btn btn-success'])}} --}}
      </div>

    </div>
  </div>
</div>