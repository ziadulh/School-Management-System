@extends('admin.app')

@section('content')

@include('Messages.message')

        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('image/Teacher/'.$teachersTableData->photo)}}">

                <h3 class="profile-username text-center">{{$teachersTableData->name}}</h3>

                <p class="text-muted text-center">Teacher</p>
                <p class="text-muted text-center"><a href="/teacher/{{$teachersTableData->id}}/edit"><button class="btn">Edit Information</button></a></p>

                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>ID</b> <a class="pull-right">00{{$teachersTableData->id}}</a>
                </li>
                <li class="list-group-item">
                    <b>Class</b> <a class="pull-right">{{$teachersTableData->id}}</a>
                </li>
                <li class="list-group-item">
                    <b>Phone No.</b> <a class="pull-right">{{$teachersTableData->contactNo}}</a>
                </li>
                </ul>
            </div>

        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About {{$teachersTableData->name}}</h3>
            </div>

            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                Reading in class {{$teachersTableData->id}} at Monipuripara High Schppl and college.
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">{{$teachersTableData->mailingAddress}}</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                <span class="label label-danger">Sports</span>
                <span class="label label-success">Gamming</span>
                <span class="label label-info">Drwing</span>
                <span class="label label-warning">Art</span>
                <span class="label label-primary">Singing</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>All information is preserved by &copy Monipuripara High School & College</p>
            </div>
            <form action="/teacher/{{$teachersTableData->id}}" method="post" >
                @csrf
                {{method_field('delete')}}
                <button type="submit" class="btn btn-danger pull-right btn-block btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

        </div>

@endsection
