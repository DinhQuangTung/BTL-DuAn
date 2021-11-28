@extends('layouts.app')

@section('content')
<div class="form-create-course mb-4 container">
        <form action="{{ route('courses.update', [$course]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="courseTitle">Title:</label>
                        <input type="text" name="course_title" class="form-control" id="courseTitle" value="">
                        @error('course_title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="courseDescription">Description:</label>
                        <input type="text" name="course_description" class="form-control" id="courseDescription" value="">
                        @error('course_description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="courseImage">Image:</label>
                        <input type="file" name="course_image" id="courseImage">
                        @error('course_image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="courseTime">Learn Time:</label>
                        <input type="text" name="course_time" class="form-control" id="courseTime" value="">
                        @error('course_time')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="coursePrices">Price:</label>
                        <input type="text" name="course_price" class="form-control" id="coursePrice" value="">
                        @error('course_price')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection