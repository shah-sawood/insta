<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'url',
        'image',
    ];

    /**
     * Return the profile picture of the user
     * or default incase of none
     */

    public function profileImage() {
        $imagePath = $this->image ? $this->image : 'profile/default.png';
        return '/storage/' . $imagePath;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
