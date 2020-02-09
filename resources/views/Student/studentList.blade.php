<link rel="stylesheet" href="{{ asset('../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">



@extends('admin.app')
@section('content')
@include('Messages.message')



<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Change</th>
                <th>Sl. No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($student as $key => $student)
                    <tr>
                        <td>

                            <form action="/student/{{$student->id}}" method="post" >
                                @csrf
                                {{method_field('delete')}}
                                <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')" type="submit"></button>
                                <a class="btn btn-primary alert-success fa fa-pencil" href="student/{{$student->id}}/edit"></a>
                            </form>

                        </td>
                        <td>{{$key+1}}</td>
                        <td><a href="student/{{$student->id}}">{{$student->name}}</a></td>
                        <td>{{$student->class}}</td>
                        <td>{{$student->contactNo}}</td>
                        <td>{{$student->email}}</td>

                    </tr>
                  @endforeach
              </tfoot>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>


@endsection

@section('jsscript')
<script src="{{ asset('../../bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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
