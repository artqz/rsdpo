<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'name', 'user_id', 'program_id', 'scores'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
