
@extends('admin.app')

@section('content')
@include('Messages.message')

        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>



          <form role="form" action="/teacher/{{$teachersTableData->id}}" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                @csrf

              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$teachersTableData->name}}">
              </div>

              <div class="form-group">
                <label for="">Father's Name</label>
                <input type="text" class="form-control" name="father" value="{{$teachersTableData->father}}">
              </div>

              <div class="form-group">
                <label for=""> Mother's Name</label>
                <input type="text" class="form-control" name="mother" value="{{$teachersTableData->mother}}">
              </div>

              <div class="form-group">
                <label for="">Gender</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" id="optionsRadios1" value="male"  {{ ($teachersTableData->gender=="male")? "checked" : "" }}>Male
                      </label><br>
                      <label>
                          <input type="radio" name="gender" id="optionsRadios1" value="female" {{ ($teachersTableData->gender=="female")? "checked" : "" }}>Female
                      </label><br>
                      <label>
                        <input type="radio" name="gender" id="optionsRadios1" value="other" {{ ($teachersTableData->gender=="other")? "checked" : "" }}>Other
                      </label><br>
                </div>
              </div>

              <div class="form-group">
                <label for="">Contact No.</label>
                <input type="text" class="form-control" name="contactNo" value="{{$teachersTableData->contactNo}}">
              </div>

              <div class="form-group">
                <label for="">Birth Day</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservation" name="birthDate" value="{{$teachersTableData->birthDate}}">
                </div>
              </div>

              <div class="form-group">
                <label for="">Mailing Address</label>
                <textarea type="text" class="form-control" rows="3" name="mailingAddress"><?php echo htmlspecialchars($teachersTableData->mailingAddress); ?></textarea>
              </div>

              <div class="form-group">
                <label for="">Permanent Address</label>
                <textarea type="text" class="form-control" rows="3" name="permanentAddress"><?php echo htmlspecialchars($teachersTableData->permanentAddress); ?></textarea>
              </div><br><br>

              <div class="form-group">
                <label for="" style="color:darkmagenta">Educational Quelification:</label>
              </div>

              @foreach ($teacher_ifon_two_table_data as $key => $ak)
                <label for="" style="color:blue">Degree {{$key+1}}</label>
                <select type="text" class="form-control" name="degree[]">
                    <option value="SSC" {{ ($ak->degree=="SSC")? "selected" : "" }}>SSC</option>
                    <option value="HSC" {{ ($ak->degree=="HSC")? "selected" : "" }}>HSC</option>
                    <option value="Bachelor" {{ ($ak->degree=="Bachelor")? "selected" : "" }}>Bachelor</option>
                    <option value="Masters" {{ ($ak->degree=="Masters")? "selected" : "" }}>Masters</option>
                    <option value="PhD" {{ ($ak->degree=="PhD")? "selected" : "" }}>PhD</option>
                </select>

                <label for="">Passing Year</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="passing_year[]" value="{{$ak->passing_year}}">
                </div>
                <label for="">Batch</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="batch[]" value="{{$ak->batch}}">
                </div>

                <label for="">Department</label>
                <input type="text" class="form-control pull-right" name="department[]" value="{{$ak->department}}"><br>

                <label for="">Organization Name</label>
                <input type="text" class="form-control pull-right" name="organization_name[]" value="{{$ak->organization_name}}"><br>

                <label for="">Result</label>
                <input type="text" class="form-control pull-right" name="result[]" value="{{$ak->result}}"><br>

                <label for="">Board</label>
                <select type="text" class="form-control" name="board[]">
                    <option value="Dhaka" {{ ($ak->board=="Dhaka")? "selected" : "" }}>Dhaka</option>
                    <option value="Chittagong" {{ ($ak->board=="Chittagong")? "selected" : "" }}>Chittagong</option>
                    <option value="Khulna" {{ ($ak->board=="Khulna")? "selected" : "" }}>Khulna</option>
                    <option value="Sylhet" {{ ($ak->board=="Sylhet")? "selected" : "" }}>Sylhet</option>
                    <option value="Rajshahi" {{ ($ak->board=="Rajshahi")? "selected" : "" }}>Rajshahi</option>
                </select><br>


              @endforeach

              <div id="expand">

              </div>



              {{-- <br><button type="button" class="btn btn-block btn-default" id="expandbutton">Click here to edit more field</button> --}}<br>

              <div class="form-group">
                <label for="exampleInputFile">Upload a Photo</label>
                <input type="file" id="exampleInputFile" name="photo" value="{{$teachersTableData->photo}}">
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

@endsection




    @section('jsscript')

    <script type="text/javascript">
        $(function() {
                $("#startdate").datepicker({ dateFormat: "dd-mm-yy" }).val()
                $("#enddate").datepicker({ dateFormat: "dd-mm-yy" }).val()
        });

    </script>



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




    <script>
        $(document).ready(function() {
            $("#reservation").datepicker({
                format: 'yyyy-mm-dd'
                });
            });


            var b = 0;
            $(document).ready(function(){
                $('#d').click(function(){
                    if(b <= 2){
                        switch(b){

                            case 0: {
                                $('#field').after('<label>Enter your H.S.C. Information </label> <textarea type="text" class="form-control" rows="3" id = "hsc" name="hsc"> <?php echo htmlspecialchars($teachersTableData->hsc); ?> </textarea>');
                                break;
                            }
                            case  1: {
                                $('#hsc').after('<label>Enter your Bachelor Degree Information </label> <textarea type="text" class="form-control" rows="3" id="bsc" name="bachelor"><?php echo htmlspecialchars($teachersTableData->bachelor); ?></textarea>');
                                break;
                            }

                            default  : {
                                $('#bsc').after('<label>Enter your Masters Degree Information </label> <textarea type="text" class="form-control" rows="3" name="masters"><?php echo htmlspecialchars($teachersTableData->masters);?></textarea>');
                            }
                        }
                        b++;
                    }

                });
            });
    </script>
@endsection

