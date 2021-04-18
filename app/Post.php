<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

        // Avoid misassignment, note: $fillable more secure
        protected $guarded = [];


        // For a market product use $fillable rather than $guarded. 


    // Create relationship

    public function user() {


        // every post object belongsTo a user object.
        return $this->belongsTo(User::class);

    }



    /**
     * S30/V203 Image Path
     * Mutators: change data before inserted to database.
     */
    // public function setPostImageAttribute($value) {

    //     if (strpos($value, '127.0.0.1:8000') !== FALSE || strpos($value, 'https://') !== FALSE) {
    //         return $value;
    //     }else{
    //     return asset('storage/' . $value);
    //     }
    // }



    /** 
     * S30/V203 Image path
     * Accessor: change data after reciving it from the database.
     * */
    public function getPostImageAttribute($value) {

        // $value = images/VEW2PdYTQlyFNigzCJDrQDJgm0F1tEjpAIJkChHF.jpg

        if (strpos($value, '127.0.0.1:8000') !== FALSE || strpos($value, 'https://') !== FALSE) {
            return $value;
        }else{
            return asset('storage/' . $value);
        }
    }

}