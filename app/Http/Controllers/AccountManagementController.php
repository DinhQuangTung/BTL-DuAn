<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountManagementController extends Controller
{
    public function index(Request $request)
    {
        $students = User::where('role', config('config.role.student'))->filter($request)->paginate(config('config.pagination'), ['*'], 'student_page');
        $teachers = User::where('role', config('config.role.teacher'))->filter($request)->paginate(config('config.pagination', ['*'], 'teacher_page'));

        $numberOfStudents = User::where('role', config('config.role.student'))->count();
        $numberOfTeachers = User::where('role', config('config.role.teacher'))->count();
        return view('management.index', compact('students', 'teachers', 'numberOfStudents', 'numberOfTeachers'));
    }

    public function destroy(User $management)
    {
        $check = User::find($management->id);
        dd($check);
        User::find($management->id)->delete();
        return back()->with('success', 'Successfully delete this user!');
    }

}
