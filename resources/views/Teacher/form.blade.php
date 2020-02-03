
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
          <label for="">Name</label>
          <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
          <label for="">Father's Name</label>
          <input type="text" class="form-control" name="father">
        </div>

        <div class="form-group">
          <label for=""> Mother's Name</label>
          <input type="text" class="form-control" name="mother">
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
          <label for="">Contact No.</label>
          <input type="text" class="form-control" name="contactNo">
        </div>

        <div class="form-group">
          <label for="">Birth Day</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation" name="birthDate">
          </div>
        </div>

        <div class="form-group">
          <label for="">Mailing Address</label>
          <textarea type="text" class="form-control" rows="3" name="mailingAddress"></textarea>
        </div>

        <div class="form-group">
          <label for="">Permanent Address</label>
          <textarea type="text" class="form-control" rows="3" name="permanentAddress"></textarea>
        </div>

        <br><br><div class="form-group" id="education">
          <label for="">Educational Quelification</label><br>

          <label for="">Degree</label>
          <select type="text" class="form-control" name="degree[]">
              <option value="SSC">SSC</option>
              <option value="HSC">HSC</option>
              <option value="Bachelor">Bachelor</option>
              <option value="Master">Master</option>
              <option value="PhD">PhD</option>
          </select>

          <label for="">Passing Year</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" name="passing_year[]">
          </div>
          <label for="">Batch</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right"  name="batch[]">
          </div>

          <label for="">Department</label>
          <input type="text" class="form-control pull-right" name="department[]"><br>

          <label for="">Organization Name</label>
          <input type="text" class="form-control pull-right" name="organization_name[]"><br>

          <label for="">Result</label>
          <input type="text" class="form-control pull-right" name="result[]"><br>

          <label for="">Board</label>
          <select type="text" class="form-control" name="board[]">
              <option value="Dhaka">Dhaka</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Khulna">Khulna</option>
              <option value="Sylhet">Sylhet</option>
              <option value="Rajshahi">Rajshahi</option>
          </select><br>
        </div>

        <div id="expand">

        </div>

        {{-- <div class="form-group" id="field">
          <label for="">Enter your S.S.C Information</label>
          <textarea type="text" class="form-control" rows="3" name="permanentAddress"></textarea>
        </div><br> --}}

        <button type="button" class="btn btn-block btn-default" id="expandbutton">Click here to add more field</button><br><br>

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
    var track = 1;


    $(document).ready( function(){
      load();
    });

    function load(){
      $("#expandbutton").click(function(){

          if(track <= 6){
            createField();
            track++;
          }
    });
    }

    function createField(){
        var educationField = "";
        educationField =
        "<div class='form-group'>"+
            "<label for=''>Educational Quelification" + "</label><br>"+

            "<label for=''>Degree</label>"+
            "<select type='text' class='form-control' name='degree[]'>"+
                "<option value='SSC'>SSC</option>"+
                "<option value='HSC'>HSC</option>"+
                "<option value='Bachelor'>Bachelor</option>"+
                "<option value='Masters'>Master</option>"+
                "<option value='PhD'>PhD</option>"+
            "</select>"+

            "<label for=''>Passing Year</label>"+
            "<div class='input-group'>"+
                "<div class='input-group-addon'>"+
                  "<i class='fa fa-calendar'></i>"+
                "</div>"+
                "<input type='text' class='form-control pull-right' name='passing_year[]'>"+
            "</div>"+

            "<label for=''>Batch</label>"+
            "<div class='input-group'>"+
                "<div class='input-group-addon'>"+
                  "<i class='fa fa-calendar'></i>"+
                "</div>"+
                "<input type='text' class='form-control pull-right' name='batch[]'>"+
            "</div>"+
            "<label for=''>Department</label>"+
            "<input type='text' class='form-control pull-right'name='department[]'><br>"+

            "<label for=''>Organization Name</label>"+
            "<input type='text' class='form-control pull-right'name='organization_name[]'><br>"+

            "<label for=''>Result</label>"+
            "<input type='text' class='form-control pull-right'name='result[]'><br>"+

            "<label for=''>Board</label>"+
            "<select type='text' class='form-control' name='board[]'>"+
                "<option value='Dhaka'>Dhaka</option>"+
                "<option value='Chittagong'>Chittagong</option>"+
                "<option value='Khulna'>Khulna</option>"+
                "<option value='Sylhet'>Sylhet</option>"+
                "<option value='Rajshahi'>Rajshahi</option>"+
            "</select><br>"+
        "</div>";

        $("#expand").append(educationField);
    }


  </script>
@endsection



