<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
// app/Models/Category.php

    protected $fillable = ['name', 'slug', 'description'];
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $category->courses()->delete();
        });
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
