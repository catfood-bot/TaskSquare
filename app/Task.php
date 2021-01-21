<?php

namespace App;

use App\Message;

use App\User;

use App\Task;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'finish', 'progress', 'memo',
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
