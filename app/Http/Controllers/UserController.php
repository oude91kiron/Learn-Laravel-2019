<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // Show method to view the profile page of the user.
    public function show(User $user) {

        return view('admin.users.profile', ['user'=>$user]);
    }


    // Method that update the user profile.
    public function update(User $user) {

        // Validate the new data.
        $inputs = request()->validate([

            'username'=> ['required', 'string',  'max:255', 'alpha_dash'],
            'name'=> ['required', 'string',  'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file'],
        ]);
        
        // Check if there is an avatar in the request if yes store it.
        if(request('avatar')){
            //dd(request('avatar'));
            $inputs['avatar'] = request('avatar')->store('images');
        }

        // Calling the update method for the object $user. 
        $user->update($inputs);

        return back();

    }

    // Method to view all the users.
    public function index() {

        $users = Auth()->User()->paginate('8');

        return view('admin.users.index', ['users'=>$users]);
    }


    // Method to delete a user.
    public function destroy(User $user) {

        $user->posts()->delete();
        $user->delete();

        session()->flash('user-deleted', 'User Has Been Deleted');

        return back();
    }
}
