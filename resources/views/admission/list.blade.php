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
                      <th>Change</th>
                      <th>SL NO.</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Contact No.</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($admissionTableData as $key => $admissionTableData)

                    <tr role="row" class="odd">

                        <td>
                            <form action="/admission/{{$admissionTableData->id}}" method="post" >
                                @csrf
                                {{method_field('delete')}}
                                <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')" type="submit"></button>
                                <a class="btn btn-primary alert-success fa fa-pencil" href="admission/{{$admissionTableData->id}}/edit"></a>
                            </form>

                        </td>
                        <td class="sorting_1">{{$key+1}}</td>
                        <td><a href="/admission/{{$admissionTableData->id}}">{{$admissionTableData->name}}</a></td>
                        <td>{{$admissionTableData->class}}</td>
                        <td>{{$admissionTableData->contactNo}}</td>
                    </tr>

                  @endforeach

            </table>
          </div>
        </div>
@endsection


@section('jsscript')
<script>
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
  </script>
@endsection







