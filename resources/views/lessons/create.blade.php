@extends('layouts.app')

@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Create Lesson<hr></h1>
        <form action="{{ route('course.lessons.store', [$course->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonTitle" class="course-label">Title:</label>
                        <input type="text" name="lesson_title" class="form-control" id="lessonTitle" value="" required>
                        @error('lesson_title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="lessonRequirement" class="course-label">Requirement:</label>
                        <input type="number" name="lesson_requirement" class="form-control" id="lessonRequirement" value="" required>
                        @error('lesson_requirement')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonImage" class="course-label">Image:</label>
                        <input type="file" name="lesson_image" id="lessonImage" required>
                        @error('lesson_image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="lessonContent" class="course-label">Content:</label>
                        <input type="text" name="lesson_content" class="form-control" id="lessonContent" value="" required>
                        @error('lesson_content')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonLearnTime" class="course-label">Learn Time:</label>
                        <input type="text" name="lesson_learn_time" class="form-control" id="lessonLearnTime" value="" required>
                        @error('lesson_learn_time')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update button-submit">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection