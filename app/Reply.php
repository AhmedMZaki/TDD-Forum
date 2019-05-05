<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;
use App\User;
class Reply extends Model
{
    protected $fillable = [
        'user_id','thread_id','body',
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
