<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lesson;
use App\Models\User;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'type',
        'logo_path',
        'file_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_users', 'document_id', 'user_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function createDocument($request, $lessonId)
    {
        if (!empty($request['document_image'])) {
            $image = $request->file('document_image');
            $path = $image->hashName();
            $request->file('document_image')->storeAs('public/logo_document', 'logo_' . $path, 'local');
            $logoPath = 'storage/logo_document/logo_' . $path;
        } else {
            $logoPath = null;
        }

        if (!empty($request['document_file'])) {
            $file = $request->file('document_file');
            $path = $file->hashName();
            $request->file('document_file')->storeAs('public/file_document', 'file_' . $path, 'local');
            $filePath = 'storage/file_document/file_' . $path;
        } else {
            $filePath = null;
        }

        Document::create([
           'lesson_id' => $lessonId,
           'name' => $request['document_name'],
           'type' => $request['document_type'],
           'logo_path' => $logoPath,
           'file_path' => $filePath
        ]);
    }
}
