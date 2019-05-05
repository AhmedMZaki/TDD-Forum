<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
use App\User;
use App\Channel;
class Thread extends Model
{
    protected $fillable = [
        'user_id','title','body','channel_id',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

}
