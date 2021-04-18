<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',  'name', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // hash the password every time the user update it.
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }



    public function posts() {

        // User object hasMany post object.
        return $this->hasMany(Post::class);
    }


    // Method allow the object of the class(user) to reach 
    // the data in the permissions table. In another world 
    // enable the user to have a permissions. 
    public function permissions() {

        return $this->belongsToMany(Permission::class);
    }

    // Method allow the object of the class(user) to reach 
    // the data in the roles table. In another world 
    // enable the user to have a role. 
    public function roles() {

        return $this->belongsToMany(Role::class);
    }


    public function userHasRole($role_name) {

        foreach( $this->roles as $role) 
        
        {
            if($role_name == $role->name)
            return true;
        }
    return false;
    }


    public function getAvatarAttribute($value) {

        // $value = images/VEW2PdYTQlyFNigzCJDrQDJgm0F1tEjpAIJkChHF.jpg

        if (strpos($value, '127.0.0.1:8000') !== FALSE || strpos($value, 'https://') !== FALSE) {
            return $value;
        }else{
            return asset('storage/' . $value);
        }
    }

}
