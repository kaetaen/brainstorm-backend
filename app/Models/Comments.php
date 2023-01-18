<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        "user_id",
        "topic_id",
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }
}
