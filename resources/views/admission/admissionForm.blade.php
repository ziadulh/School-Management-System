@extends('admin.app')

@section('content')
@include('Messages.message')



        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>



          <form role="form" action="/admission" method="POST" enctype="multipart/form-data">
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
                <label for="">Class</label>
                <input type="text" class="form-control" name="class">
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

              <div class="form-group">
                <label for="">Local Guardian Name</label>
                <input type="text" class="form-control" name="localGurdianName">
              </div>

              <div class="form-group">
                <label for="">Local Guardian Contact No.</label>
                <input type="text" class="form-control" name="localGuardianContactNo">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Upload a Photo</label>
                <input type="file" id="exampleInputFile" name="photo">
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
            $(document).ready(function() {
                $("#reservation").datepicker({
                    format: 'yyyy-mm-dd'
                });
                });
        </script>
@endsection
