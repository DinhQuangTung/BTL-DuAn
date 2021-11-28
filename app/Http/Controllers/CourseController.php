<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;
use Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::where('role', config('config.role.teacher'))->get();
        $courses = Course::filter($request)->paginate(config('config.pagination'));
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function create()
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->role == User::ROLE_ADMIN || Auth::user()->role == User::ROLE_TEACHER) {
                return view('courses.create');
            } else {
                echo "ban k co quyen truy cap" ;
            }
        } else {
            echo "ban k co quyen truy cap";
        }
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->createCourse($request);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }


    public function show(Request $request, Course $course)
    {
        $lessons = Lesson::search($request, $course)->paginate(config('config.pagination'), ['*'], 'lesson_page');
        $reviews = $course->reviews()->orderBy('id', 'desc')->paginate(config('config.pagination'), ['*'], 'review_page');
        return view('courses.show', compact('course', 'lessons', 'reviews'));
    }

    public function edit(Course $course)
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->role == User::ROLE_ADMIN || Auth::user()->role == User::ROLE_TEACHER) {
                return view('courses.edit', compact('course'));
            } else {
                echo "ban k co quyen truy cap" ;
            }
        } else {
            echo "ban k co quyen truy cap" ;
        }
    }

    public function update(Request $request, Course $course)
    {
        $course->updateCourse($request);

        return redirect()->route('courses.show', [$course])->with('success', 'Course updated successfully');
    }
}
