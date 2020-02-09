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
                <label for="class">Class</label>
                <select class="form-control" id="class" name="class">
                    @foreach ($cls as $cls)
                    <option value = "{{$cls->id}}">{{$cls->class_name}}{{$cls->id}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
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
                <label for="reservation">Birth Day</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="reservation" name="birthDate" readonly>
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

              <div class="form-group">
                <label for="localGurdianName">Local Guardian Name</label>
                <input type="text" class="form-control" name="localGurdianName" id="localGurdianName">
              </div>

              <div class="form-group">
                <label for="localGuardianContactNo">Local Guardian Contact No.</label>
                <input type="text" class="form-control" name="localGuardianContactNo" id="localGuardianContactNo">
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
