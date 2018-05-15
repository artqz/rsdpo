<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name', 'user_id', 'is_hide'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
