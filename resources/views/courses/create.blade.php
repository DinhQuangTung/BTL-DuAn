@extends('layouts.app')

@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Create Course<hr></h1>
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="courseTitle" class="course-label">Title <span style="color: red;">*</span></label>
                        <input type="text" name="course_title" class="form-control" id="courseTitle" value="" required>
                        @error('course_title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="courseDescription" class="course-label">Description <span style="color: red;">*</span></label>
                        <textarea type="text" name="course_description" rows="3" class="form-control" id="courseDescription" required></textarea>
                        @error('course_description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="courseImage" class="d-block course-label">Image <span style="color: red;">*</span></label>
                        <input type="file" name="course_image" id="courseImage" required>
                        @error('course_image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="coursePrices" class="course-label">Price <span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <input type="number" name="course_price" class="form-control" id="coursePrice" min="0" max="99999" value="" aria-label="Amount (to the nearest dollar)" required>
                            <div class="input-group-append">
                                <span class="input-group-text text-dark">$</span>
                            </div>
                        </div>
                        @error('course_price')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group d-flex">
                        <label for="courseDescription" class="course-label d-flex mr-2">Tags <span style="color: red;">*</span></label>
                        <select class="get-value input-change form-control form-control-custom select-tag select-2-multiple" id="courseTag" name="course_tag[]" style="width:100%" data-placeholder="" multiple="multiple">
                            <option value="">Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update button-submit">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection