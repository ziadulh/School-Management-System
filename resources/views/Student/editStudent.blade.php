@extends('admin.app')

@section('content')
<br>
@include('Messages.message')


    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center">
                <h3 class="box-title">Edit Admission Form</h3>

            </div>

            <form role="form" action="/student/{{$student->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                        {{-- <input type="hidden" name="_token" value="JMtDNG7CnekYPoNbTXyz053Nc2RHLHTt7uGlyzoQ">                        <input type="hidden" name="_method" value="PUT"> --}}

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$student->name}}" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="father">Father's Name</label> {{-- ' --}}
                        <input type="" class="form-control" value="{{$student->father}}" name="father" id="father">
                    </div>

                    <div class="form-group">
                        <label for="mother">Mother's Name</label> {{-- ' --}}
                        <input type="" class="form-control" value="{{$student->mother}}" name="mother" id="mother">
                    </div>

                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="" class="form-control" value="{{$student->class}}" name="class" id="class">
                    </div>

                      <div class="form-group">
                        <label for="">Gender</label>
                        <div class="radio">
                          <label>
                            <input type="radio" name="gender" id="optionsRadios1" value="male"  {{ ($student->gender=="male")? "checked" : "" }}>Male
                          </label><br>
                          <label>
                              <input type="radio" name="gender" id="optionsRadios1" value="female" {{ ($student->gender=="female")? "checked" : "" }}>Female
                          </label><br>
                          <label>
                            <input type="radio" name="gender" id="optionsRadios1" value="other" {{ ($student->gender=="other")? "checked" : "" }}>Other
                          </label><br>
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="contactNo">Phone No.</label>
                        <input type="" class="form-control" value="{{$student->contactNo}}" name="contactNo" id="contactNo">
                    </div>

                    <div class="form-group">
                        <label for="reservation">Birth Day</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation" value="{{$student->birthDate}}" name="birthDate" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mailingAddress">Mailing Address</label>
                        <textarea type="text" class="form-control" rows="3" name="mailingAddress" id="mailingAddress"><?php echo htmlspecialchars($student->mailingAddress); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="permanentAddress">Permanent Address</label>
                        <textarea type="text" class="form-control" rows="3" name="permanentAddress" id="permanentAddress"><?php echo htmlspecialchars($student->permanentAddress); ?></textarea>
                      </div>

                    <div class="form-group">
                        <label for="localGurdianName">Local Gurdian Name</label>
                        <input type="" class="form-control" value="{{$student->localGurdianName}}" name="localGurdianName" id="localGurdianName">
                    </div>

                    <div class="form-group">
                        <label for="localGuardianContactNo">Local Gurdian's Phone No.</label>
                        {{-- 'this comment only for get rid of text color on editor --}}
                        <input type="" class="form-control" value="{{$student->localGuardianContactNo}}" name="localGuardianContactNo" id="localGuardianContactNo">
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" value="{{$student->photo}}" name="photo" id="photo">
                    </div>

                    <select class="form-control select2" style="width: 100%;" name="publish">
                        <option selected value=1>Yes</option>
                        <option value=0>No</option>
                    </select>

                </div>

                {{method_field('put')}}

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
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
