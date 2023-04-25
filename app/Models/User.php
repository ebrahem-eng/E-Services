<?php

namespace App\Models;

//use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'UserType',
        'password',
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected function name():Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function translate_graduation(){
        return $this->hasMany(Translate_Graduation::class,'user_id','id');
    }

    public function translate_cv(){
        return $this->hasMany(Translate_Cv::class,'user_id','id');
    }

    public function write_market_content(){
        return $this->hasMany(Write_Market_Content::class,'user_id','id');
    }

    public function write_article(){
        return $this->hasMany(Write_Artical::class,'user_id','id');
    }

    public function write_research(){
        return $this->hasMany(write_research::class,'user_id','id');
    }

    public function edit_check(){
        return $this->hasMany(Editing_Check::class,'user_id','id');
    }

    public function ask_us(){
        return $this->hasMany(Ask_Us::class,'user_id','id');
    }

    public function write_cv(){
        return $this->hasMany(Write_Cv::class,'user_id','id');
    }

    public function power_point(){
        return $this->hasMany(Power_Point::class,'user_id','id');
    }
}
