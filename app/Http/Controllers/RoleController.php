<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Role;

class RoleController extends Controller
{
    // Function will route to admin/roles/index
    public function index () {

        return view('admin.roles.index', ['roles'=>Role::all()]);
    }



    // Function to edit the role.
    public function edit(Role $role){

        return view('admin.roles.edit', ['role'=>$role]);
        
    }


    // Function to store new role.
    public function store() {

        //dd(\request('name'));

        request()->validate([
            'name'=>['required']
        ]);

        Role::create(
            [
            'name'=>Str::ucfirst(request('name')), 
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
            ]);

        session()->flash('role_created', 'Role Has been Created Successfuly.');

        return back();
    }


    // Function to update the role.
    public function update(Role $role) {

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if($role->isDirty('name')){

            session()->flash('updated', 'Role Has Been Updated To ' . request('name') . '.');

            $role->save();

        } else {

            session()->flash('updated', 'Seems There is Nothing To Change.');

        }

        
        return back();
    }


    // Function to delete a role.
    public function destroy(Role $role) {

        $role->delete();

        session()->flash('role_deleted','Role has been deleted successfuly.');

        return back();
    }



}
