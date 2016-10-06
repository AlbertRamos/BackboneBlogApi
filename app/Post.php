<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillables = ['id', 'slug', 'date', 'updated_at', 'created_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getImageHeaderAttribute($value){
        return $this->attributes['image_header'] = url('/') .'/'. $value;
    }
    public function getDateAttribute($value){
       return $this->attributes['date'] = Carbon::parse($value)->format('l jS \\of F Y');
    }
}
