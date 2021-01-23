<?php

namespace App;

use App\Message;

use App\User;

use App\Task;

use App\Group;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_name'
    ];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
