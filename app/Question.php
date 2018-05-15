<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'name', 'program_id', 'image', 'is_hide'
    ];

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
