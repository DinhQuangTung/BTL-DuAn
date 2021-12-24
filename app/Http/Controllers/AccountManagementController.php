<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class AccountManagementController extends Controller
{
    public function index(Request $request)
    {
        $users = User::filter($request)->paginate(config('config.pagination'), ['*'], 'user_page');
        $numberOfUsers = User::all()->count();
        $numberOfTeachers = User::where('role', config('config.role.teacher'))->count();
        
        $courses = Course::filter($request)->paginate(config('config.pagination'), ['*'], 'course_page');
        
        return view('management.index', compact('users', 'numberOfUsers', 'numberOfTeachers', 'courses'));
    }

    public function deleteUser(Request $request)
    {
        User::findOrFail($request['username_id'])->delete();
        return back()->with('success', 'Successfully delete this user!');
    }

    public function editUser(Request $request)
    {
        $user = User::findOrFail($request['username_id']);
        if ($request['username_edit'] == null) {
            $request['username_edit'] = $user->name;
        }
        if ($request['email_edit'] == null) {
            $request['email_edit'] = $user->email;
        }
        if ($request['address_edit'] == null) {
            $request['address_edit'] = $user->address;
        }
        if ($request['phone_edit'] == null) {
            $request['phone_edit'] = $user->phone;
        }
        if ($request['role_edit'] != 0 && $request['role_edit'] != 1 && $request['role_edit'] != null) {
            return back()->with('error', 'Role User is not suitable!');
        }
        
        $user->update([
            'name' => $request['username_edit'],
            'email' => $request['email_edit'],
            'address' => $request['address_edit'],
            'phone' => $request['phone_edit'],
            'role' => $request['role_edit']
        ]);
        $user->save();
        
        return back()->with('success', 'Successfully edit this user!');
    }

    public function deleteCourse(Request $request)
    {
        Course::findOrFail($request['course_id'])->delete();
        
        return redirect('/admin/management#pillsCourse')->with('success', 'Successfully delete this course');
    }
}
