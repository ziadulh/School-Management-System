@extends('admin.app')

@section('content')
<br>
@include('Messages.message')


    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center">
                <h3 class="box-title">Edit Admission Form</h3>

            </div>

            <form role="form" action="/admission/{{$getData->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                        {{-- <input type="hidden" name="_token" value="JMtDNG7CnekYPoNbTXyz053Nc2RHLHTt7uGlyzoQ">                        <input type="hidden" name="_method" value="PUT"> --}}

                <div class="box-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="" class="form-control" value="{{$getData->name}}" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Father's Name</label> {{-- ' --}}
                        <input type="" class="form-control" value="{{$getData->father}}" name="father">
                    </div>

                    <div class="form-group">
                        <label for="">Mother's Name</label> {{-- ' --}}
                        <input type="" class="form-control" value="{{$getData->mother}}" name="mother">
                    </div>

                    <div class="form-group">
                        <label for="">Class</label>
                        <input type="" class="form-control" value="{{$getData->class}}" name="class">
                    </div>

                      <div class="form-group">
                        <label for="">Gender</label>
                        <div class="radio">
                          <label>
                            <input type="radio" name="gender" id="optionsRadios1" value="male"  {{ ($getData->gender=="male")? "checked" : "" }}>Male
                          </label><br>
                          <label>
                              <input type="radio" name="gender" id="optionsRadios1" value="female" {{ ($getData->gender=="female")? "checked" : "" }}>Female
                          </label><br>
                          <label>
                            <input type="radio" name="gender" id="optionsRadios1" value="other" {{ ($getData->gender=="other")? "checked" : "" }}>Other
                          </label><br>
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="">Phone No.</label>
                        <input type="" class="form-control" value="{{$getData->contactNo}}" name="contactNo">
                    </div>

                    <div class="form-group">
                        <label for="">Birth Day</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation" value="{{$getData->birthDate}}" name="birthDate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Mailing Address</label>
                        <textarea type="text" class="form-control" rows="3" name="mailingAddress"><?php echo htmlspecialchars($getData->mailingAddress); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Permanent Address</label>
                        <textarea type="text" class="form-control" rows="3" name="permanentAddress"><?php echo htmlspecialchars($getData->permanentAddress); ?></textarea>
                      </div>

                    <div class="form-group">
                        <label for="">Local Gurdian Name</label>
                        <input type="" class="form-control" value="{{$getData->localGurdianName}}" name="localGurdianName">
                    </div>

                    <div class="form-group">
                        <label for="">Local Gurdian's Phone No.</label>
                        {{-- 'this comment only for get rid of text color on editor --}}
                        <input type="" class="form-control" value="{{$getData->localGuardianContactNo}}" name="localGuardianContactNo">
                    </div>

                    <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" class="form-control" value="{{$getData->photo}}" name="photo">
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
