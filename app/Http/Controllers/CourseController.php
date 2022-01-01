<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
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
        $courses = Course::where('course_status', true)->filter($request)->paginate(config('config.pagination'));
        $tags = Tag::get();

        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function create()
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->role == User::ROLE_ADMIN || Auth::user()->role == User::ROLE_TEACHER) {
                $tags = Tag::get();

                return view('courses.create', compact('tags'));
            } else {
                return view('components.error');
            }
        } else {
            return view('components.error');
        }
    }

    public function store(StoreCourseRequest $request)
    {
        $course = new Course();
        $createdCourse = $course->createCourse($request);

        $tagNames = $request['course_tag'];
        $tags = Tag::all();

        foreach ($tagNames as $tagName) {
            $tmpTag = $tags->filter(function ($tag) use ($tagName) {
                return $tag->name == $tagName;
            })->first();

            if (empty($tmpTag)) {
                $newTag = new Tag();
                $newTag->createTag($tagName);
                $createdCourse->tags()->attach($newTag->id);
            } else {
                $createdCourse->tags()->attach($tmpTag->id);
            }
        }



        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }


    public function show(Request $request, Course $course)
    {
        $lessons = Lesson::search($request, $course)->paginate(config('config.pagination'), ['*'], 'lesson_page');
        $reviews = $course->reviews()->orderBy('id', 'desc')->paginate(config('config.pagination'), ['*'], 'review_page');
        $allTags = Tag::all();

        return view('courses.show', compact('course', 'lessons', 'reviews', 'allTags'));
    }

    public function edit(Course $course)
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->role == User::ROLE_ADMIN || Auth::user()->role == User::ROLE_TEACHER) {
                $tags = Tag::get();

                return view('courses.edit', compact('course', 'tags'));
            } else {
                return view('components.error');
            }
        } else {
            return view('components.error');
        }
    }

    public function update(Request $request, Course $course)
    {
        $course->updateCourse($request);

        return redirect()->route('courses.show', [$course])->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        Course::where('id', $course->id)->delete();

        return redirect()->route('courses.index');
    }

    public function approveCourse(Request $request)
    {
        $course = Course::where('id', $request['id'])->first();
        if ($course['course_status']) {
            $course['course_status'] = false;
            $course->save();
            return 'unapproved';
        } else {
            $course['course_status'] = true;
            $course->save();
            return 'approved';
        }
    }
}
