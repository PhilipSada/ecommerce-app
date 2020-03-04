<div class='row expanded' style='margin:0 0.9rem'>

    @if(isset($errors) || \App\Classes\Session::has('error'))

    <div class='callout alert' data-closable>
      
       @if(\App\Classes\Session::has('error'))
          {{\App\Classes\Session::flash('error')}}

       @else
        {{-- the foreach is done like this because the error is in form of multidimensional array --}}
            @foreach($errors as $error_array)

                @foreach($error_array as $error_item)
                    {{$error_item}} <br/>
                @endforeach
            @endforeach
        @endif
        <button class='close-button' aria-label='Dismiss alert' type='button' data-close>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>

    @endif

    {{-- data-closable is a javascript method that makes an info closable --}}

    


    @if(isset($success) || \App\Classes\Session::has('success'))

    <div class='callout success' data-closable>
       @if(isset($success))
        {{$success}}
       @elseif(\App\Classes\Session::has('success'))
          {{\App\Classes\Session::flash('success')}}
       @endif

        <button class='close-button' aria-label='Dismiss alert' type='button' data-close>
            <span aria-hidden='true'>&times;</span>
        </button>
        
    </div>

    @endif

    

</div>