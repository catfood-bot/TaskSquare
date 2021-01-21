<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body'];
    
    protected $dates = ['created_at'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
