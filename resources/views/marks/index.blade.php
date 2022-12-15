@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-2">
        <div class="pull-left">
            <h2>Studnet Mark Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('student-mark.create') }}"> Insert Student Mark</a>
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
        <th scope="col">Studnet Name</th>
        <th scope="col">Term</th>
        <th scope="col">Maths Mark</th>
        <th scope="col">Science Mark</th>
        <th scope="col">History Mark</th>
        <th scope="col">Total Mark</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($student_marks as $mark)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$mark->student->student_name}}</td>
            <td>{{$mark->term->term_title}}</td>
            <td>{{$mark->maths_mark}}</td>
            <td>{{$mark->science_mark}}</td>
            <td>{{$mark->history_mark}}</td>
            <td>{{$mark->total_mark}}</td>
            <td>
                <form method="POST" action="{{route('student-mark.destroy',encrypt($mark->mark_id))}}">
                    <a href="{{route('student-mark.edit',encrypt($mark->mark_id))}}" class="btn btn-primary">Edit</a>
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
