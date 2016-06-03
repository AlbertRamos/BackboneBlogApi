<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillables = ['date'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getDateAttribute($value){
       return $this->attributes['date'] = Carbon::parse($value)->format('l jS \\of F Y');
    }
}
