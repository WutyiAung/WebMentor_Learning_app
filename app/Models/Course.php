<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'level',
        'category_id',
        'description',
        'url',
        'source',
        'image',
        'youtube_video_id',
    ];
    

    public function category()
    {
        // return $this->belongsTo(Category::class);
        return $this->belongsTo(Category::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(User::class, 'enrollments')->withTimestamps();
    }
    

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
