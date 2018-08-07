<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed email
 * @property string email_token
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_token', 'money', 'promo_img', 'promo_desc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_token', 'number'
    ];

    /**
     * Assume this is a teacher
     */
    function pupils() {
        return $this->belongsToMany('App\User', 'students_subscriptions', 'student_id', 'teacher_id');
    }

    /**
     * Assume this is a student
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function tutors() {
        return $this->belongsToMany('App\User', 'students_subscriptions', 'teacher_id', 'student_id');
    }
}
