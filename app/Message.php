<?php

namespace App;

use App\Group;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body'];
    
    protected $dates = ['created_at'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
