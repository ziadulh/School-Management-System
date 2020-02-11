
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
        <form action="/resultGenerate" method="get">
            <div class="input-group input-group-sm">
                <select class="form-control" name="class">
                    <option></option>
                    @foreach ($class as $class)
                        @if ($class->id == $class_id)
                            <option selected value="{{$class->id}}">{{$class->class_name}}</option>
                        @else
                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                        @endif
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </span>
            </div>
        </form>
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
                  @foreach ($student_table_data as $key => $student_table_data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><a href="resultGenerate/{{$student_table_data->id}}">{{$student_table_data->name}}</a></td>
                        <td>{{$student_table_data->class}}</td>
                        <td>{{$student_table_data->contactNo}}</td>
                        <td>{{$student_table_data->email}}</td>

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

