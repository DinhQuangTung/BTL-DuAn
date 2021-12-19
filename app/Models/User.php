<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    const ROLE_STUDENT = 0;
    const ROLE_TEACHER = 1;
    const ROLE_ADMIN = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone_number',
        'birthday',
        'avatar',
        'address',
        'about_me',
        'role',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The courses that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_users', 'user_id', 'course_id')->withTimestamps();
    }

    /**
     * The lessons that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_users', 'user_id', 'lesson_id');
    }

    /**
     * Get all of the reviews for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'document_users', 'user_id', 'document_id')->withPivot('lesson_id')->withTimestamps();
    }

    public function getMyCoursesAttribute()
    {
        return $this->courses()->get();
    }

    public function updateProfile($request, $user)
    {
        $user->update([
            'name' => $request['profile_name'],
            'birthday' => $request['profile_birthday'],
            'phone_number' => $request['profile_phone'],
            'address' => $request['profile_address'],
            'about_me' => $request['profile_desc'],
        ]);
    }

    public function updateAvatar($request, $user)
    {
//        $request->file('profile_avatar')->storeAs('public/avatars', 'avatar_' . $user->username . '.png', 'local');
//        $avatarPath = 'storage/avatars/avatar_' . $user->username . '.png';
//        $path = $request->file('profile_avatar')->store('avatars', 's3');
//        Storage::disk('s3')->setVisibility($path, 'public');
//        $avatarPath = Storage::disk('s3')->url($path);
//        $user->avatar = $avatarPath;
//        $user->save();

        $image = $request->file('profile_avatar');
        $path = Storage::disk('s3')->put('/', $image, 'public');
        $user->avatar = Storage::disk('s3')->url($path);
        $user->save();
    }
}