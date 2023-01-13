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
        'content',
    ];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function topic() {
        $this->belongsTo(Topic::class);
    }
}
