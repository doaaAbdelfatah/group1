<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Contacts;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // protected $with =["contacts"];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // function contacts(){
    //     return $this->hasMany(Contacts::class, "user_id" ,"id");
    // }
    // function contact_types(){
    //     return $this->belongsToMany(ContactType::class ,"contacts" );
    // }
    public function contacts()
    {
        return $this->morphMany(Contacts::class, 'account');
    }
    function products (){
        return $this->hasMany(Products::class ,"seller_id" ,"id");
    }
}
