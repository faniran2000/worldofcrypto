@if(Session::has('success'))
    <div class="text-center font-weight-bold alert alert-success border-bottom-2 border-success"> {{ Session::get('success') }} </div>
@endif

@if(Session::has('error'))
    <div class="text-center font-weight-bold alert alert-danger border-bottom-2 border-danger"> {{ Session::get('error') }} </div>
@endif

@if(Session::has('info'))
    <div class="text-center font-weight-bold alert alert-info border-bottom-2 border-info"> {{ Session::get('info') }} </div>
@endif

@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif