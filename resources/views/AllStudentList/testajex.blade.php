@extends('admin.app')
@section('content')

@foreach ($subject as $s)
    {{$s->subject_name}}<br>
@endforeach
<br>
<button type="submit" name="btn_name" id="btn_id">Get Data</button>
@endsection


@section('jsscript')
    <script>
        $('#btn_id').on('click',function(){
            $.get("{{ URL::to('myform/ajex')}}", function(data){
                $.each(data, function(i,value){
                    alert(value.subject_name);
                });
            })
        })
    </script>
@endsection
