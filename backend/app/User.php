<?php

namespace App;

use Carbon\Carbon;
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
        'name', 'email', 'password', 'email_token', 'money', 'number',
        'promo_img', 'promo_desc', 'speciality'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_token', 'number'
    ];

    // Личное
    protected $personal = ['email', 'money', 'number'];

    public function getPersonal() {
        return $this->personal;
    }

    public static function prettyCount() {
        $count = self::count();

        if ($count >= 50) {
            return '>50';
        }

        if ($count >= 100) {
            return '>100';
        }

        if ($count >= 1000) {
            return '>' . (ceil($count / 1000) * 1000) . 'K';
        }

        if ($count >= 1000000) {
            return '>' . (ceil($count / 1000) * 1000) . 'K';
        }

        return "тысячи";
    }

    /**
     * Assume this is a student
     */
    public function student_classes() {
        return $this->belongsToMany('App\EducationalClass', 'students_subscriptions', 'class_id', 'student_id')->withTimestamps();
    }

    /**
     * Assume this is a teacher
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teacher_classes() {
        return $this->hasMany('App\EducationalClass', 'teacher_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('c');
    }
}
