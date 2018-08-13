<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function tags() {
        return $this->belongsToMany('App\EducationalClass', 'class_tags', 'class_id', 'tag_id');
    }
}
