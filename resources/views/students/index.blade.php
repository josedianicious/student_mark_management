@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-2">
        <div class="pull-left">
            <h2>Studnet Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Student</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb mt-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
</div>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Gender</th>
        <th scope="col">Teacher Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$student->student_name}}</td>
            <td>{{$student->student_email}}</td>
            <td>{{$student->mobile_number}}</td>
            <td>{{$student->gender_text}}</td>
            <td>{{$student->teacher->teacher_name}}</td>
            <td>
                <form method="POST" action="{{route('student.destroy',encrypt($student->student_id))}}">
                    <a href="{{route('student.edit',encrypt($student->student_id))}}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit"class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach


    </tbody>
</table>
@endsection
