<style>
    br{
      -webkit-user-select: none; /* Safari */
      -moz-user-select: none; /* Firefox */
      -ms-user-select: none; /* IE10+/Edge */
      user-select: none; /* Standard */
    }

    label{
      color: black;
    }

    .hidden{
      display:none;
    }

</style>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<div class="fade modal" id="empAddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content container-fluid">
        {!! Form::open(['class' => 'needs-validation','action' => 'App\Http\Controllers\EmployeesController@store', 'method' => 'POST', 'novalidate', 'id' => 'addEmpForm']) !!}

        <div class="modal-header">

          <h2 class="modal-title" id="empAddModalLabel">ADD NEW EMPLOYEE</h2>


          <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          

          <div class="row">
            
            <div class="col-xl-1"></div>
            

            <div class="col-xl">

              {{-- START OF PERSONAL Information --}}

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Profile Picture</h6>
                </div>
            
                  <div class="col-xl-3 col-centered">
                    
                    <div class="row">                            
                      <p class="p-1 border bg-light" style="height:228px; width:228px; margin-left:10px;" id="surroundImage">
      
                        <img class="img-fluid img-thumbnail hidden" id="frame" src="" style="width:228px; max-height:228px;"/>
      
                      </p>      
                    </div>
      
                    <div class="row">    
                      <p>
      
                        <input type="file" onchange="preview()" name="profilePicSrc">
      
                      </p>      
                    </div>
      
                  </div>

                  <br>
                  <hr>
                  <br>
                  
              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Full Name</h6>
                </div>

                <div class="col-xl-4 form-floating">

                  {{Form::text('fName', NULL, ['class' => 'form-control filled', 'placeholder' => 'First Name', 'id' => 'floatingFirst','required'])}}
                  <label for="floatingFirst">First Name</label>
                </div>

                <div class="col-xl-3 form-floating">

                  {{Form::text('mName', NULL, ['class' => 'form-control filled', 'placeholder' => 'Middle Name', 'id' => 'floatingMiddle', 'optional'])}}
                  <label for="floatingFirst">Middle Name (Optional)</label>
                </div>

                <div class="col-xl-3 form-floating">

                  {{Form::text('lName', NULL, ['class' => 'form-control filled', 'placeholder' => 'Last Name', 'id' => 'floatingLast','required'])}}
                  <label for="floatingFirst">Last Name</label>
                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Current Address</h6>
                </div>

                <div class="col-xl-4 form-floating">

                  {{Form::text('street', NULL, ['class' => 'form-control filled', 'placeholder' => 'Street', 'id' => 'floatingAddress', 'required'])}}
                  <label for="floatingAddress">Street Address (Bldg. #, Brgy)</label>
                </div>

                <div class="col-xl-3 form-floating">

                  {{Form::text('city', NULL, ['class' => 'form-control filled', 'placeholder' => 'City', 'id' => 'floatingAddress', 'required'])}}
                  <label for="floatingAddress">City</label>
                </div>

                <div class="col-xl-3 form-floating">

                  {{Form::text('province', NULL, ['class' => 'form-control filled', 'placeholder' => 'Province', 'id' => 'floatingAddress', 'required'])}}
                  <label for="floatingAddress">Province</label>
                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Birth Date</h6>
                </div>

                <div class="col-lg-3">

                    {{Form::date('bDate', 'Birthday', ['class' => 'form-control', 
                                  'placeholder' => 'Birthday', 
                                  'data-bs-toggle' => 'tooltip', 
                                  'data-bs-placement' => 'left', 
                                  'id' => 'bDay', 'required', 
                                  'style' => 'height: 58px; border-radius: 5px;'])}}
                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Sex</h6>
                </div>

                <div class="col-lg-2" style="max-height: 58px;">

                  <div class="dropdown">
                    {{Form::select('sex', [NULL => '---', 'M' => 'Male', 'F' => 'Female'], 0, ['class' => 'form-select', 
                                    'type' => 'button', 
                                    'style' => 'height: 58px', 
                                    'required'])}}
                  </div>

                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Contact Info</h6>
                </div>

                <div class="col-lg input-group" style="height: 58px">

                  <span class="input-group-text">+63</span>
                  {{Form::number('contactNum1', NULL, ['class' => 'form-control', 
                                  'placeholder' => 'Primary Contact #',
                                  'aria-describedby' => 'countryCode', 
                                  'style' => 'font-size: 18px',
                                  'maxlength' => '10', 'required'])}}

                </div>

                <div class="col-lg input-group" style="height: 58px">

                  <span class="input-group-text">+63</span>
                  {{Form::number('contactNum2', NULL, ['class' => 'form-control', 
                                  'placeholder' => 'Secondary Contact # (Optional)',
                                  'aria-describedby' => 'countryCode', 
                                  'style' => 'font-size: 18px', 
                                  'maxlength' => '10'])}}

                </div>
              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Emgy. Contact</h6>
                </div>

                <div class="col-lg form-floating">

                  {{Form::text('emergencyContactName', NULL, ['class' => 'form-control filled', 'placeholder' => 'Emergency Contact Name', 'id' => 'floatingEmergency'])}}
                  <label for="floatingEmergency">Emergency Contact's Full Name</label>
                </div>

                <div class="col-lg input-group" style="height: 58px">

                  <span class="input-group-text">+63</span>
                  {{Form::number('emergencyContactNum', NULL, ['class' => 'form-control', 
                                  'placeholder' => 'Emergency Contact #',
                                  'aria-describedby' => 'countryCode', 
                                  'style' => 'font-size: 18px',
                                  'maxlength' => '10'])}}

                </div>
                
              </div>

              <br>
              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Attainment 1</h6>
                </div>

                <div class="col">
                  <div class="row g-2">
                    <div class="dropdown col-lg-3">
                      {{Form::select('attainment1', [NULL => 'Type', 'Secondary' => 'Secondary', 'Tertiary' => 'Tertiary', 'Vocational' => 'Vocational'],NULL, ['class' => 'form-select','type' => 'button', 'style' => 'height: 58px'])}}
                    </div>
    
                    <div class="col-lg-5 form-floating" style="margin-right:0px">
    
                      {{Form::text('attainmentTitle1', NULL, ['class' => 'form-control filled', 'placeholder' => 'Attainment', 'id' => 'floatingAddress'])}}
                      <label for="floatingAddress">Attainment Title</label>
                    </div>

                    <div class="col-lg-3 border bg-light" style="font-size: 92%; max-height: 58px; border-radius: 5px;">

                      <span style="margin-left:10px">Date Attained:</span>
                      <div class="row-auto">
                        {{Form::date('attained_on1', 'Date Attained', ['class' => 'form-control', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'left', 'id' => 'attained_on', 'style' => 'border: none;'])}}
                      </div>
    
                    </div>
    
                    <div class="col-lg-12 form-floating" style="margin-right:0px">
    
                      {{Form::text('attainmentDesc1', NULL, ['class' => 'form-control filled', 'placeholder' => 'Attainment', 'id' => 'floatingAddress'])}}
                      <label for="floatingAddress">Description (Optional)</label>
                    </div>
                  </div>
                </div>                

              </div>
              
              <br>
              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Attainment 2</h6>
                </div>

                <div class="col">
                  <div class="row g-2">
                    <div class="dropdown col-lg-3">
                      {{Form::select('attainment2', [NULL => 'Type', 'Secondary' => 'Secondary', 'Tertiary' => 'Tertiary', 'Vocational' => 'Vocational'],NULL, ['class' => 'form-select','type' => 'button', 'style' => 'height: 58px'])}}
                    </div>
    
                    <div class="col-lg-5 form-floating" style="margin-right:0px">
    
                      {{Form::text('attainmentTitle2', NULL, ['class' => 'form-control filled', 'placeholder' => 'Attainment', 'id' => 'floatingAddress'])}}
                      <label for="floatingAddress">Attainment Title</label>
                    </div>

                    <div class="col-lg-3 border bg-light" style="font-size: 92%; max-height: 58px; border-radius: 5px;">

                      <span style="margin-left:10px">Date Attained:</span>
                      <div class="row-auto">
                        {{Form::date('attained_on2', 'Date Attained', ['class' => 'form-control', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'left', 'id' => 'attained_on', 'style' => 'border: none;'])}}
                      </div>
    
                    </div>
    
                    <div class="col-lg-12 form-floating" style="margin-right:0px">
    
                      {{Form::text('attainmentDesc2', NULL, ['class' => 'form-control filled', 'placeholder' => 'Attainment', 'id' => 'floatingAddress'])}}
                      <label for="floatingAddress">Description (Optional)</label>
                    </div>
                  </div>
                </div>                

              </div>
              
              <br>
              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Attainment 3</h6>
                </div>

                <div class="col">
                  <div class="row g-2">
                    <div class="dropdown col-lg-3">
                      {{Form::select('attainment3', [NULL => 'Type', 'Secondary' => 'Secondary', 'Tertiary' => 'Tertiary', 'Vocational' => 'Vocational'],NULL, ['class' => 'form-select','type' => 'button', 'style' => 'height: 58px'])}}
                    </div>
    
                    <div class="col-lg-5 form-floating" style="margin-right:0px">
    
                      {{Form::text('attainmentTitle3', NULL, ['class' => 'form-control filled', 'placeholder' => 'Attainment', 'id' => 'floatingAddress'])}}
                      <label for="floatingAddress">Attainment Title</label>
                    </div>

                    <div class="col-lg-3 border bg-light" style="font-size: 92%; max-height: 58px; border-radius: 5px;">

                      <span style="margin-left:10px">Date Attained:</span>
                      <div class="row-auto">
                        {{Form::date('attained_on3', 'Date Attained', ['class' => 'form-control', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'left', 'id' => 'attained_on', 'style' => 'border: none;'])}}
                      </div>
    
                    </div>
    
                    <div class="col-lg-12 form-floating" style="margin-right:0px">
    
                      {{Form::text('attainmentDesc3', NULL, ['class' => 'form-control filled', 'placeholder' => 'Attainment', 'id' => 'floatingAddress'])}}
                      <label for="floatingAddress">Description (Optional)</label>
                    </div>
                  </div>
                </div>                

              </div>

              {{-- END OF PERSONAL INFORMATION --}}

              <br>
              <hr>
              <br>

              <div class="row g-2">
                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Company ID</h6>
                </div>

                  <div class="col-xl-4 form-floating">

                    {{Form::number('company_id', NULL, ['class' => 'form-control filled', 'placeholder' => 'Company ID', 'id' => 'floatingFirst','required'])}}
                    <label for="floatingFirst">Company ID</label>
                  </div>

              </div>

                <br>

              <div class="row g-2">
                
                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Date Hired</h6>
                </div>
    
                  <div class="col-lg-3">

                      {{Form::date('hired_on', 'Date Hired', ['class' => 'form-control',
                                    'data-bs-toggle' => 'tooltip', 
                                    'data-bs-placement' => 'left', 
                                    'id' => 'hired_on', 'required', 
                                    'style' => 'height: 58px; border-radius: 5px;'])}}
                  </div>
    

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Employment Status</h6>
                </div>

                <div class="dropdown col-lg-4">
                  {{Form::select('empStatus', $statuses->pluck('type'),NULL, ['class' => 'form-select', 'placeholder' => '---','type' => 'button', 'style' => 'height: 58px','required'])}}
                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Branch</h6>
                </div>

                <div class="dropdown col-lg-4">
                  {{Form::select('branch', $branches->pluck('name'),NULL, ['class' => 'form-select', 'placeholder' => '---','type' => 'button', 'style' => 'height: 58px','required'])}}
                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Department</h6>
                </div>

                <div class="dropdown col-lg-4">
                  {{Form::select('department', $departments->pluck('name'),NULL, ['class' => 'form-select', 'placeholder' => '---','type' => 'button', 'style' => 'height: 58px', 'required'])}}
                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Assigned Role</h6>
                </div>

                <div class="dropdown col-lg-3">
                  {{Form::select('position1', $positions->pluck('name'),NULL, [
                            'class' => 'form-select',
                            'placeholder' => 'Primary Role',
                            'type' => 'button',
                            'style' => 'height: 58px',
                            'required'
                    ])}}
                </div>

                <div class="dropdown col-lg-3">
                  {{Form::select('position2', $positions->pluck('name'), NULL, ['class' => 'form-select', 'placeholder' => 'Other Role (optional)','type' => 'button', 'style' => 'height: 58px'])}}
                </div>

                <div class="dropdown col-lg-3">
                  {{Form::select('position3', $positions->pluck('name'), NULL, ['class' => 'form-select', 'placeholder' => 'Other Role (optional)','type' => 'button', 'style' => 'height: 58px'])}}
                </div>
              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Assigned Project</h6>
                </div>

                <div class="dropdown col-lg-4">
                  {{Form::select('project', $departments->pluck('name'),NULL, ['class' => 'form-select', 'placeholder' => 'Project Title (Optional)','type' => 'button', 'style' => 'height: 58px'])}}
                </div>

                <div class="col-lg-6 form-floating" style="margin-right:0px">

                  {{Form::text('location', NULL, ['class' => 'form-control filled', 'placeholder' => 'Project Location', 'id' => 'floatingAddress'])}}
                  <label for="floatingAddress">Project Location (Optional)</label>
                </div>

              </div>

              <br>
              <hr>
              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Current Rate</h6>
                </div>

                <div class="col-sm input-group" style="height: 58px; max-width: 35vh">

                  <span class="input-group-text">Php</span>
                  {{Form::number('current_rate', 0, ['class' => 'form-control', 
                                  'placeholder' => 'Amount',
                                  'style' => 'font-size: 18px',
                                  'required'])}}
                  <span class="input-group-text">.00</span>

                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Previous Rate</h6>
                </div>

                <div class="col-sm input-group" style="height: 58px; max-width: 35vh">

                  <span class="input-group-text">Php</span>
                  {{Form::number('previous_rate', 0, ['class' => 'form-control', 
                                  'placeholder' => 'Amount (Optional)',
                                  'style' => 'font-size: 18px'])}}
                  <span class="input-group-text">.00</span>

                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Current Loan</h6>
                </div>

                <div class="col-sm input-group" style="height: 58px; max-width: 35vh">

                  <span class="input-group-text">Php</span>
                  {{Form::number('previous_rate', 0, ['class' => 'form-control', 
                                  'placeholder' => 'Amount (Optional)',
                                  'style' => 'font-size: 18px'])}}
                  <span class="input-group-text">.00</span>

                </div>

              </div>

              <br>

              <div class="row g-2">

                <div class="col-xl-2 d-flex align-items-center" style="vertical-align: middle">
                  <h6>Allowance</h6>
                </div>

                <div class="col-sm input-group" style="height: 58px; max-width: 35vh">

                  <span class="input-group-text">Php</span>
                  {{Form::number('allowance', 0, ['class' => 'form-control', 
                                  'placeholder' => 'Amount (Optional)',
                                  'style' => 'font-size: 18px'])}}
                  <span class="input-group-text">.00</span>

                </div>

              </div>

              <br>



              {{-- <div class="container1">
                <button class="add_form_field">Add New Field &nbsp; 
                  <span style="font-size:16px; font-weight:bold;">+ </span>
                </button>
                <div><input type="text" name="mytext[]"></div>
              </div> --}}

              

            </div>

            <div class="col-xl-1"></div>    

          </div>


          {{-- END OF MODAL BODY --}}

          <input name="change_type" value="1" class="hidden"/>


          

        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" id="closer">Close</button>
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

      $(document).ready(function() {
          var max_fields = 10;
          var wrapper = $(".container1");
          var add_button = $(".add_form_field");

          var x = 1;

          $(add_button).click(function(e) {
              e.preventDefault();
              if (x < max_fields) {
                  x++;
                  $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
              } else {
                  alert('You Reached the limits')
              }
          });

          $(wrapper).on("click", ".delete", function(e) {
              e.preventDefault();
              $(this).parent('div').remove();
              x--;
          })
      });
    </script>

    @include('tools.formValidation')


</div>
