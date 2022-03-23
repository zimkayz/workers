<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Userdetail;

class Userdetail extends Model
{
    protected $fillable = ['skill','user_id','position','pos_id'];

    protected $cast =['skill' => 'array'];

    public function setSkillAttribute($value)
    {
        $this->attributes['skill'] = json_encode($value);
    }

    public function getSkillAttribute($value)
    {
        return $this->attributes['skill'] = json_decode($value);
    }
    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function pos()
    {
        return $this->hasOne(Position::class,'id', 'pos_id');
    }



}
