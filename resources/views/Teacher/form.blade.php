
@extends('admin.app')

@section('content')

@include('Messages.message')

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Example</h3>
    </div>



    <form role="form" action="/teacher" method="POST" enctype="multipart/form-data">
      <div class="box-body">
          @csrf



        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
          <label for="father">Father's Name</label>
          <input type="text" class="form-control" name="father" id="father">
        </div>

        <div class="form-group">
          <label for="mother"> Mother's Name</label>
          <input type="text" class="form-control" name="mother" id="mother">
        </div>

        <div class="form-group">
          <label for="">Gender</label>
          <div class="radio">
            <label>
              <input type="radio" name="gender" id="optionsRadios1" value="male">Male
            </label><br>
            <label>
                <input type="radio" name="gender" id="optionsRadios1" value="female">Female
            </label><br>
            <label>
              <input type="radio" name="gender" id="optionsRadios1" value="other">Other
            </label><br>
          </div>
        </div>

        <div class="form-group">
          <label for="contactNo">Contact No.</label>
          <input type="text" class="form-control" name="contactNo" id="contactNo">
        </div>

        <div class="form-group">
          <label for="birthDate">Birth Day</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker" name="birthDate" id="birthDate" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="mailingAddress">Mailing Address</label>
          <textarea type="text" class="form-control" rows="3" name="mailingAddress" id="mailingAddress"></textarea>
        </div>

        <div class="form-group">
          <label for="permanentAddress">Permanent Address</label>
          <textarea type="text" class="form-control" rows="3" name="permanentAddress" id="permanentAddress"></textarea>
        </div>

        <br><br>
        <div class="form-group">
            <label for="">Educational History 1.</label><br>

            <div class="row" id="education">
                <div class="col-lg-1">
                    <label for="degree">Degree</label>
                    <select type="text" class="form-control" name="degree[]" id="degree">
                        <option value="SSC">SSC</option>
                        <option value="HSC">HSC</option>
                        <option value="Bachelor">Bachelor</option>
                        <option value="Masters">Master</option>
                        <option value="PhD">PhD</option>
                    </select>
                </div>

                <div class="col-lg-2">
                    <label for="passing_year">Passing Year</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right datepicker" name="passing_year[]" id="passing_year" readonly>
                    </div>
                </div>

                <div class="col-lg-2">
                    <label for="batch">Batch</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right datepicker"  name="batch[]" id="batch" readonly>
                    </div>
                </div>

                <div class="col-lg-2">
                    <label for="department">Department</label>
                    <input type="text" class="form-control pull-right" name="department[]" id="department"><br>
                </div>

                <div class="col-lg-2">
                    <label for="organization_name">Organization Name</label>
                    <input type="text" class="form-control pull-right" name="organization_name[]" id="organization_name">
                </div>

                <div class="col-lg-1">
                    <label for="result">Result</label>
                    <input type="text" class="form-control pull-right" name="result[]" id="result">
                </div>

                <div class="col-lg-1">
                    <label for="board">Board</label>
                    <select type="text" class="form-control" name="board[]" id="board">
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Rajshahi">Rajshahi</option>
                    </select>
                </div>

                <div class="col-lg-1">
                    <label for="">Add</label>
                    <button type="button"  class=" form-control pull-right btn btn-block btn-danger fa fa-plus" id="expandbutton"></button>
                </div>
            </div>

        </div>

        <div id="expand">
        </div>

        <div class="form-group">
          <label for="exampleInputFile">Upload a Photo</label>
          <input type="file" name="photo">
        </div>

        <select class="form-control select2" style="width: 100%;" name="publish">
          <option selected value=1>Yes</option>
          <option value=0>No</option>
        </select>

      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>

@endsection




@section('jsscript')
<script>

    var track = 2;

    $(document).ready( function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
        });


        load();
    });



    function load(){
      $("#expandbutton").click(function(){
          if(track <= 3){
            createField();
            track++;
          }
    });
    }

    function createField(){
        var educationField = "";
        educationField =

        "<div class='form-group' id='education'>"+
            "<label for=''>Educational History "+ track + "."+"</label>"+"<br>"+

            "<div class='row'>"+
                "<div class='col-lg-1'>"+
                    "<label for='degree'>Degree"+"</label>"+
                    "<select type='text' class='form-control' name='degree[]' id='degree'>"+
                        "<option value='SSC'>SSC</option>"+
                        "<option value='HSC'>HSC</option>"+
                        "<option value='Bachelor'>Bachelor</option>"+
                        "<option value='Master'>Master</option>"+
                        "<option value='PhD'>PhD</option>"+
                    "</select>"+
                "</div>"+

                "<div class='col-lg-2'>"+
                    "<label for='passing_year'>Passing Year"+"</label>"+
                    "<div class='input-group'>"+
                        "<div class='input-group-addon'>"+
                            "<i class='fa fa-calendar'>"+"</i>"+
                        "</div>"+
                        "<input type='text' class='form-control pull-right datepicker' name='passing_year[]' id='passing_year' readonly>"+
                    "</div>"+
                "</div>"+

                "<div class='col-lg-2'>"+
                    "<label for='batch'>Batch"+"</label>"+
                    "<div class='input-group'>"+
                        "<div class='input-group-addon'>"+
                            "<i class='fa fa-calendar'>"+"</i>"+
                        "</div>"+
                        "<input type='text' class='form-control pull-right datepicker'  name='batch[]' id='batch' readonly>"+
                    "</div>"+
                "</div>"+

                "<div class='col-lg-2'>"+
                    "<label for='department'>Department"+"</label>"+
                    "<input type='text' class='form-control pull-right' name='department[]' id='department'>"+
                "</div>"+

                "<div class='col-lg-2'>"+
                    "<label for='organization_name'>Organization Name"+"</label>"+
                    "<input type='text' class='form-control pull-right' name='organization_name[]' id='organization_name'>"+
                "</div>"+

                "<div class='col-lg-1'>"+
                    "<label for='result'>Result"+"</label>"+
                    "<input type='text' class='form-control pull-right' name='result[]' id='result'>"+
                "</div>"+

                "<div class='col-lg-1'>"+
                    "<label for='board'>Board"+"</label>"+
                    "<select type='text' class='form-control' name='board[]' id='board'>"+
                        "<option value='Dhaka'>Dhaka"+"</option>"+
                        "<option value='Chittagong'>Chittagong"+"</option>"+
                        "<option value='Khulna'>Khulna"+"</option>"+
                        "<option value='Sylhet'>Sylhet"+"</option>"+
                        "<option value='Rajshahi'>Rajshahi"+"</option>"+
                    "</select>"+
                "</div>"+

                "<div class='col-lg-1'>"+
                    "<label for=''>Remove"+"</label>"+
                    "<button type='button'  class=' form-control pull-right btn btn-block btn-danger fa fa-minus' id='remove'>"+"</button>"+
                "</div>"+


            "</div>"+
        "</div>";

        $(document).ready( function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd'
            });

            $("#education").on('click','#remove',function(){
                $(this).expand('div').remove();
            });
        });

        $("#expand").append(educationField);
    }


  </script>
@endsection



