<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name', 'category_id', 'path', 'is_hide'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
