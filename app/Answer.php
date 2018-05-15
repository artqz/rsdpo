<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'name', 'question_id', 'correct', 'is_hide'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
