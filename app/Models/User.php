<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Detach related enrollments
            $user->enrollments()->detach();

            // Optionally delete user image if needed
            if ($user->image) {
                $imagePath = parse_url($user->image, PHP_URL_PATH);
                $imagePath = ltrim($imagePath, '/');
                Storage::delete('public/' . $imagePath);
            }
        });
    }

    public function enrollments()
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function hasRole($role)
    {
        return $this->is_admin === ($role === 'admin' ? 1 : 0);
    }
}
