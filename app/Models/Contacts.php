<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    public $fillable =["contact_type_id" , "contact" ,"user_id"];

    public function user(){
        return $this->belongsTo("User");
    }
    function contact_type(){
        return $this->belongsTo("ContactType");
    }
}
