<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'image_at', 
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
}
