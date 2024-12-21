<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function role(){
        return $this->belongsTo(Role::class)->withDefault();
        //اتبع ل role

    }
    //معناته انه اليوزر هيكون اله صورة وحدة فقط
    function image(){
        return $this->morphOne(Image::class ,'imageable');
    }

    function reviews(){
        return $this->hasMany(Review::class);
    }

    function orders(){
        return $this->hasMany(Order::class);
    }

    function order_details(){
        return $this->hasMany(OrderDetail::class);
    }


    function payment(){
        return $this->hasMany(Payment::class);
    }
    function testimonials(){
        return $this->hasMany(Testimonial::class);
    }


}
