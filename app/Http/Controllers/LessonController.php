<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $lesson = new Lesson();
        $lesson->createLesson($request, $course->id);

        return redirect()->route('courses.show', [$course])->with('success', 'Lesson created successfully');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $lesson->updateLesson($request, $course->id);

        return redirect()->route('course.lessons.show', [$course, $lesson])->with('success', 'Lesson updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Lesson $lesson)
    {
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        return view('lessons.show', compact('course', 'lesson', 'otherCourses'));
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        Lesson::where('id', $lesson->id)->delete();

        return redirect()->route('courses.show', $course)->with('success', 'Delete the lesson successfully');
    }
}
