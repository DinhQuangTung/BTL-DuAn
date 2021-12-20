@extends('layouts.app')

@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Edit Course<hr></h1>
        <form action="{{ route('courses.update', [$course]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="courseTitle" class="course-label">Title:</label>
                        <input type="text" name="course_title" class="form-control" id="courseTitle" value="{{ $course->title }}" placeholder=""required>
                        @error('course_title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="courseDescription" class="course-label">Description:</label>
                        <input type="text" name="course_description" class="form-control" id="courseDescription" value="{{ $course->description }}" required>
                        @error('course_description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label class="course-label" for="courseImage">Image:</label>
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
                        <label for="coursePrices" class="course-label">Price:</label>
                        <input type="number" name="course_price" class="form-control" id="coursePrice" value="{{ $course->price }}" placeholder="VND" required>
                        @error('course_price')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group d-flex">
                        <label for="courseDescription" class="course-label mr-2">Tags:</label>
                        <select class="get-value input-change form-control form-control-custom select-tag  select-2" id="courseTag" name="course_tag" style="width:100%" multiple>
                            <option value="">Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" @if ($tag->id == request('tag')) selected @endif>{{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update button-submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection