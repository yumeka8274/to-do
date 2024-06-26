<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'body','folder_id','deadline','flag',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }


}
