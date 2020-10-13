<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    use HasFactory;
    public $timestamps =false;

    public $fillable =["type"];

    function users(){
        return $this->belongsToMany("App\Models\User" ,"contacts" );
    }

    function contacts(){
        return $this->hasMany(Contacts::class ,"contact_type_id" , "id");
    }

    
}
