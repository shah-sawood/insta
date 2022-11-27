<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'image',
        'user_id',
    ];

    /**
     * Get user of particular post
     */

    public function user() {
        return $this->belongsTo(User::class);
    }
}
