@if(count($errors) > 0)
    <div class="alert alert-danger" id="error">

        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            @foreach($errors->all() as $key=>$error)
            
                {{$error}}. 
            
            @endforeach
        </div>
        
    </div>
@endif

@if (session('success'))
        <div class="alert alert-success card-text" id="success">
            {{session('success')}}
        </div>
    
@endif

@if (session('error'))
        <div class="alert alert-danger" id="sessionError">
            {{session('error')}}
        </div>
    
@endif

<script>
    setTimeout(function() {
        $('#success').fadeOut('fast');
    }, 5000);

    setTimeout(function() {
        $('#sessionError').fadeOut('fast');
    }, 5000);

    setTimeout(function() {
        $('#error').fadeOut('fast');
    }, 5000);
</script>