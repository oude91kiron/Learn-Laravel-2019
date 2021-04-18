<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    // Avoid misassignment, note: $fillable more secure
    protected $guarded = [];

    
    // Method enable the Role object to get a data from the permissions table. 
    public function permissions() 
    {
        return $this->belongsToMany(Permission::class);
    }

    // Method enable the Role object to get a data from the user table. 
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }


}
