@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-2">
        <div class="pull-left">
            <h2>Add Studnet Mark</h2>
        </div>
        <div class="pull-right mt-2 mb-2">
            <a class="btn btn-warning" href="{{ route('student-mark.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<form class="form-inline" action="{{route('student-mark.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="student_id">Student</label>
                <select class="form-select" aria-label="Default select example" name="student_id">
                <option value="">Select Student</option>
                @foreach ($students as $student)
                    <option value="{{$student->student_id}}" {{ old('student_id') == $student->student_id ? "selected" : ""}}>{{$student->student_name}}</option>
                @endforeach
                </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <label class="sr-only" for="term">Term</label>
                <select class="form-select" aria-label="Default select example" name="term_id">
                <option value="">Select Term</option>
                @foreach ($terms as $term)
                    <option value="{{$term->term_id}}" {{ old('term_id') == $term->term_id ? "selected" : ""}}>{{$term->term_title}}</option>
                @endforeach
                </select>
            </div>
            @error('term_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="maths">Maths Mark</label>
                <input type="number" class="form-control" name="maths_mark" value="{{old('maths_mark')}}" min="0" max="50">
            </div>
            @error('maths_mark')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="maths">Science Mark</label>
                <input type="number" class="form-control" name="science_mark" value="{{old('science_mark')}}" min="0" max="50">
            </div>
            @error('science_mark')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="maths">History Mark</label>
                <input type="number" class="form-control" name="history_mark" value="{{old('history_mark')}}" min="0" max="50">
            </div>
            @error('history_mark')
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
