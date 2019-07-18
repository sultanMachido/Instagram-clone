<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = [];
    public function User(){

        return $this->belongsTo(User::class);

    }
    public function followers(){

        return $this->belongsToMany(User::class);
    }
    
    public function profileImage(){
        $imagePath = ($this->image) ? $this->image :  'profile/hjzjq1KE7aQnMnbOQVGMHaeSJWKRBA29TNBlJhgS.jpeg' ;
        return '/storage/'. $imagePath;
    }
}
