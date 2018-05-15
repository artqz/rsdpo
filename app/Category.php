<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'program_id', 'is_hide'
    ];

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }
}
