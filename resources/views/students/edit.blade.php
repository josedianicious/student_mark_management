@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-2">
        <div class="pull-left">
            <h2>Add Studnet Details</h2>
        </div>
        <div class="pull-right mt-2 mb-2">
            <a class="btn btn-warning" href="{{ route('student.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<form class="form-inline" action="{{route('student.update',encrypt($student->student_id))}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label class="sr-only" for="email">Student Name</label>
            <input type="student_name" class="form-control" name="student_name" value="{{old('student_name',$student->student_name)}}">
            </div>
            @error('student_name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="email">Student Email</label>
                <input type="student_email" class="form-control" name="student_email" value="{{old('student_email',$student->student_email)}}">
            </div>
            @error('student_email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="student_phone_number">Student Phone Number</label>
                <input type="student_phone_number" class="form-control" name="student_phone_number" value="{{old('student_phone_number',$student->mobile_number)}}">
            </div>
            @error('student_phone_number')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group m-2">
                <label class="sr-only" for="gender">Gender</label>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="gender" id="btnradio1" autocomplete="off" value='1' {{ old('gender',$student->gender) == "1"? "checked" : '' }}>
                    <label class="btn btn-outline-primary" for="btnradio1">Male</label>
                    <input type="radio" class="btn-check" name="gender" id="btnradio2" value="2" {{ old('gender',$student->gender) == "2"? "checked" : '' }} autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">Female</label>
                </div>
            </div>
            @error('gender')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <label class="sr-only" for="teacher">Teacher</label>
                <select class="form-select" aria-label="Default select example" name="teacher_id">
                <option value="">Select Teacher</option>
                @foreach ($teachers as $teacher)
                    <option value="{{$teacher->teacher_id}}" {{ old('teacher_id',$student->teacher_id) == $teacher->teacher_id ? "selected" : ""}}>{{$teacher->teacher_name}}</option>
                @endforeach
                </select>
            </div>
            @error('teacher_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
  </form>
@endsection
