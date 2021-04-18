<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{


    // Avoid misassignment, note: $fillable more secure
    protected $guarded = [];

    // Method allow the object of the class to reach the data
    // in the roles table.
    public function role() 
    {
        $this->belongsToMany(Role::class);
    }

    // Method allow the object of the class to reach the data 
    // in the users table.
    public function users() 
    {
        $this->belongsToMany(User::class);
    }
}
