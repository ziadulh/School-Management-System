
@extends('admin.app')
@section('content')
@include('Messages.message')

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Example</h3>
    </div>



    <form role="form" action="/resultGenerate" method="POST">
        <div class="box-body">
            @csrf

            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$student_table_data->name}}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Class</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$cls->class_name}}" readonly>
            </div>

            <input type="hidden" class="form-control" id="get_class_id" value="{{$cls->id}}" readonly>

            <div class="form-group">
                <label for="">Subject and Marks :</label><br>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="subject">Subjects</label>
                        <select type="text" class="form-control" name="subject[]" id="subject">
                            @foreach ($subject as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject_name}} - {{$subject->for_class}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="result">Obtain Marks</label>
                        <input type="text" class="form-control pull-right" name="result[]" id="result">
                    </div>
                    <div class="col-lg-2">
                        <label for="result">Out of</label>
                        <input type="text" class="form-control pull-right" name="result[]" id="result">
                    </div>

                    <div class="col-lg-1">
                        <label for="">Add/Remove</label>
                        <button type="button"  class=" form-control pull-right btn btn-block btn-danger fa fa-plus" id="btn_id"></button>
                    </div>
                </div>

            </div>

            <div id="expand">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div

    </form>

</div>

@endsection

@section('jsscript')
<script>

    var control=1;

    // function to create dropdown
    $('#btn_id').on('click',function(){

        var get_class_id = document.getElementById('get_class_id').value;

        $.get("{{ URL::to('myform/ajex/{get_class_id}')}}", function(data){

            var dyselect=
            "<div class='form-group'>"+
            "<div class='row'>"+
                "<div class='col-lg-6'>"+
                    "<select type='text' class='form-control' name='subject_name[]' id='degree'>";
                    $.each(data, function(key,value){
                        dyselect+=('<option value="'+ value.id + '">'+ value.subject_name + " - " + value.for_class +'</option>');
                    });
                    dyselect+=
                    "</select>"+
                "</div>"+

                "<div class='col-lg-3'>"+
                    "<input type='text' class='form-control pull-right' name='obtain_marks[]' id='result'>"+
                "</div>"+

                "<div class='col-lg-2'>"+
                    {{-- "<label for='result'>Out of</label>"+ --}}
                    "<input type='text' class='form-control pull-right' name='out_of[]' id='result'>"+
                "</div>"+

                "<div class='col-lg-1'>"+
                    "<button type='button'  class=' form-control pull-right btn btn-block btn-danger fa fa-minus' id='remove'></button>"+
                "</div>"+
                "</div>"+

            "</div>";

            if(control < 4){
                $('#expand').append(dyselect); control++;
            }

        })

    });

</script>
@endsection

