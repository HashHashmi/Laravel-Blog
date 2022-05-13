<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    // protected $guarded = [];
    
    public function post() // post_id
    {
        return $this->belongsTo(Posts::class, "post_id");
    }

    public function author() // author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
