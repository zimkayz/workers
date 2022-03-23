<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Userdetail;
use App\User;

class Position extends Model
{
    protected $fillable = [
        'position',
    ];

    public function pos()
    {
        return $this->hasOne(Userdetail::class,'pos_id', 'id');
    }

    public function usercount()
    {
        return $this->hasOne(Userdetail::class, 'pos_id','id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'pos_id','user_id');
    }
}
