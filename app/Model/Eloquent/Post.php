<?php
namespace App\Model\Eloquent;

class Post extends \Illuminate\Database\Eloquent\Model
{
    protected $connection = CONNECTION_SECOND;
    
    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

