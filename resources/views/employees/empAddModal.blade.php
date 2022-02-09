{{-- @php 
  use \App\Http\Controllers\EmployeesController;
@endphp --}}

<style>
  br
    {
        -webkit-user-select: none; /* Safari */        
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+/Edge */
        user-select: none; /* Standard */
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

        {!! Form::open(['action' => 'App\Http\Controllers\EmployeesController@store', 'method' => 'POST']) !!}
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
                  
                  <h5>Personal Information</h5>
                  <div class="col-xl-4 form-floating">
                    
                    {{Form::text('fName', '', ['class' => 'form-control filled', 'placeholder' => 'First Name', 'id' => 'floatingFirst'])}}
                    <label for="floatingFirst">First Name</label>
                  </div>
  
                  <div class="col-xl-4 form-floating">
                    
                    {{Form::text('mName', '', ['class' => 'form-control filled', 'placeholder' => 'Middle Name', 'id' => 'floatingMiddle'])}}
                    <label for="floatingFirst">Middle Name</label>
                  </div>
  
                  <div class="col-xl-4 form-floating">
                    
                    {{Form::text('lName', '', ['class' => 'form-control filled', 'placeholder' => 'Last Name', 'id' => 'floatingLast'])}}
                    <label for="floatingFirst">Last Name</label>
                  </div>
  
              </div>
  
              <br>
              <br>
  
              <div class="row g-3">
  
                <div class="col-lg-7 form-floating" style="margin-right:0px">
                    
                  {{Form::text('address', '', ['class' => 'form-control filled', 'placeholder' => 'Address', 'id' => 'floatingAddress'])}}
                  <label for="floatingAddress">Address</label>
                </div>

                <div class="col-lg-2" style="font-size: 100%; max-height: 58px;)">
  
                  <div class="dropdown">
                    {{Form::select('sex', ['M' => 'Male', 'F' => 'Female'], 'M', ['class' => 'btn btn-light btn-outline-grey dropdown-toggle filled border', 'type' => 'button', 'style' => 'height: 58px'])}}
                  </div>
                    
                </div>
  
                <div class="col-lg-3">
                  
                  {{Form::date('bDate', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'First Name', 'style' => 'height: 58px;'])}}
                </div>
  
                
  
                  <div class="col-lg input-group" style="height: 58px">
                      
                    <span class="input-group-text">+63</span>
                    {{Form::text('contactNum1', '', ['class' => 'form-control', 'placeholder' => 'Primary Contact #','aria-describedby' => 'countryCode', 'style' => 'font-size: 18px'])}}
  
                  </div>
  
                  <div class="col-lg input-group" style="height: 58px">
                      
                    <span class="input-group-text">+63</span>
                    {{Form::text('contactNum2', '', ['class' => 'form-control', 'placeholder' => 'Secondary Contact # (Optional)','aria-describedby' => 'countryCode', 'style' => 'font-size: 18px'])}}
  
                  </div>
                  
              </div>
  
            </div>

          </div>
          

            
            
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-success">Add</button> --}}
          {{Form::submit('Add', ['class' => 'btn btn-success'])}}
        </div>

        {!! Form::close() !!}

      </div>
    </div>

    
    {{--image preview--}}

    {{-- <script>
      jQuery(document).ready(function() {
            document.getElementById("jimage").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    if (e.total > 250000) {
                        $('#imageerror').text('Image too large');
                        $jimage = $("#jimage");
                        $jimage.val("");
                        $jimage.wrap('<form>').closest('form').get(0).reset();
                        $jimage.unwrap();
                        $('#uploadedimage').removeAttr('src');
                        return;
                    }
                    $('#imageerror').text('');
                    document.getElementById("uploadedimage").src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            };
        });
    </script> --}}

    
</div>