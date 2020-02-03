@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    {{-- <div class="alert alert-success">
        *{{session('success')}}<br>
    </div> --}}

    <div class="alert alert-success alert-dismissible">
        @if (Auth::check())
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @endif

        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
