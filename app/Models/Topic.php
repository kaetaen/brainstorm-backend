<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topic';
    protected $fillable = [
        'title',
        'theme',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
