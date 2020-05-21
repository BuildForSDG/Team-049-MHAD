<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $fillable = [
        'user_id','slug','name','gender','occupation','specialty', 'phone','country','avatar'
    ];
    
    public function getRouteKeyName(){
        return 'slug';
        }

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
