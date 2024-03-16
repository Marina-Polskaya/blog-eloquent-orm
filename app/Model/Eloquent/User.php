<?php
namespace App\Model\Eloquent;

class User extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'users';
    protected $primaryKey = 'id';
    protected $connection = CONNECTION_DEFAULT;
    
    public function posts()
    {
        //user.id == posts.user_id
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}