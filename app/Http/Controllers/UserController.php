<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Http\Requests\UpdateProfileRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        if (Auth::id() == $user->id) {
            if (Auth::user()->role == 1) {
                $coursesOfTeacher = Course::where('teacher_id', $user->id)->get();
            } else {
                $coursesOfTeacher = null;
            }
            return view('users.profile', compact('user', 'coursesOfTeacher'));
        } else {
            return 'You can not access this page!';
        }
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        if (isset($request['profile_avatar'])) {
            $user->updateAvatar($request, $user);
            return redirect()->back()->with('success', 'Avatar update successful!');
        } else {
            $user->updateProfile($request, $user);
            return redirect()->back()->with('success', 'Profile update successful!');
        }
    }

    public function destroy(Request $request)
    {
        return '1';
    }
}
