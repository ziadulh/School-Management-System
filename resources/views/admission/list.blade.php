@extends('admin.app')
@section('content')

@include('Messages.message')

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List of Students</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                  <tr>

                      <th><input type="checkbox" id="select_all" onclick="myFunction()"><span> Select All</span></th>
                      <th>Change</th>
                      <th>SL NO.</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Contact No.</th>
                  </tr>
              </thead>
              <tbody>

                <form id="outterform" action="/confirmation/sendMail/" method="POST">
                    @csrf

                    <div id="outterform">


                        @foreach ($admissionTableData as $key => $admissionTableData)

                            <tr role="row" class="odd">
                                <td>
                                    <input class="checkbox" type="checkbox" value="{{$admissionTableData->id}}" name="student_id[]">
                                </td>

                                <td>

                                    <a class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')" href="{{URL::to('admission/'.$admissionTableData->id.'/delete')}}" ></a>
                                    <a class="btn btn-primary alert-success fa fa-pencil"  href="admission/{{$admissionTableData->id}}/edit"></a>



                                </td>

                                <td class="sorting_1">{{$key+1}}</td>
                                <td><a href="/admission/{{$admissionTableData->id}}">{{$admissionTableData->name}}</a></td>
                                <td>{{$admissionTableData->class}}</td>
                                <td>{{$admissionTableData->contactNo}}</td>
                            </tr>

                        @endforeach
                    </div>

              </tbody>
            </table>
            {{-- <input type="submit" class="btn btn-primary alert-danger fa fa-trash"> --}}
            <br><label>Send Confirmation Mail</label><br>
            <button class="btn btn-primary alert-dark fa fa-envelope" onclick="return confirm('Are you sure to send confirmation to selected student that thay are passed?')" type="submit" name="sendMail"></button>

            <br><br><label>Store Selected Student Data to Student Table</label><br>
            <button class="btn btn-primary alert-success fa fa-copy" onclick="return confirm('Are you sure to send confirmation to selected student that thay are passed?')" type="submit" name="store"></button>
        </form>


        {{-- <form action="/admission/{{$admissionTableData->id}}" method="post" >
    @csrf
    {{method_field('delete')}}
    <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')" type="submit"></button>
    <a class="btn btn-primary alert-success fa fa-pencil" href="admission/{{$admissionTableData->id}}/edit"></a>
</form> --}}




          </div>
        </div>

@endsection


@section('jsscript')
<script>
    {{--  function myFunction() {
        var prnt = document.getElementById("parent");
        var child_checkbox = document.getElementsByTagName("input");

        if(prnt.checked === true){
            for(var i = 0; i < child_checkbox.length; i++){
                if(child_checkbox[i].type == "checkbox" && child_checkbox[i].id = "child_check" ){
                    alert("Yse");

                }
            }
        }
    }  --}}



            function myFunction(){
                var select_all = document.getElementById("select_all"); //select all checkbox
                var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

                //select all checkboxes
                select_all.addEventListener("change", function(e){
                    for (i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = select_all.checked;
                    }
                });


                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
                        //uncheck "select all", if one of the listed checkbox item is unchecked
                        if(this.checked == false){
                            select_all.checked = false;
                        }
                        //check "select all" if all checkbox items are checked
                        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                            select_all.checked = true;
                        }
                    });
                }
            }





$(function(){
    $("#outtrbutton").dynaForm({
        div : "outterform",
        formName : "student_id",
        formAction : "/confirmation/sendMail/",
        ajax : true,
    });
})


    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })

    $("#select_all").change(function(){  //"select all" change
        $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });

    //".checkbox" change
    $('.checkbox').change(function(){
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(false == $(this).prop("checked")){ //if this item is unchecked
            $("#select_all").prop('checked', false); //change "select all" checked status to false
        }
        //check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#select_all").prop('checked', true);
        }
    });
  </script>
@endsection








