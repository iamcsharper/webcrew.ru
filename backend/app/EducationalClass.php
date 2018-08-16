<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EducationalClass extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'next_date', 'price', 'max_places', 'teacher_id', 'name'
    ];

    /**
     * Use created_at, updated_at
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'edu_classes';

    public function getCreatedAtAttribute($date)
    {
        if (is_null($date))
            return null;

        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('c');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'class_tags', 'tag_id', 'class_id');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'students_subscriptions', 'student_id', 'class_id');
    }
}