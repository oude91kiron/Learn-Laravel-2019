<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Permission;

class PermissionController extends Controller
{
    // Function will route to admin/permissions/index  
    public function index () {

        return view('admin.permissions.index', ['permissions'=>Permission::all()]);
    }

    // Function to store new permission.
    public function store() {

        //dd(\request('name'));

        request()->validate([
            'name'=>['required']
        ]);

        Permission::create(
            [
            'name'=>Str::ucfirst(request('name')), 
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
            ]);

        session()->flash('permission_created', 'Permission Has been Created Successfuly.');

        return back();
    }


        // Function to edit the permission.
        public function edit(permission $permission){

        return view('admin.permissions.edit', [
            'permission'=>$permission,
            'permissions'=>Permission::all()
        ]);
        
    }
    
        // Function to update the permission.
        public function update(permission $permission) {

            $permission->name = Str::ucfirst(request('name'));
            $permission->slug = Str::of(request('name'))->slug('-');
    
            if($permission->isDirty('name')){
    
                session()->flash('updated', 'Permission Has Been Updated To: ' . request('name'));
    
                $permission->save();
    
            } else {
    
                session()->flash('updated', 'Seems There is Nothing To Change.');
    
            }
    
            
            return back();
        }
    
    
        // Function to attach permissions to a permission.
        public function attach_permission(permission $permission) {
    
            $permission->permissions()->attach(request('permission'));
    
            return back();
        }
    
    
        // Function to attach permissions to a permission.
        public function detach_permission(permission $permission) {
    
            $permission->permissions()->detach(request('permission'));
    
            return back();
        }
    
        // Function to delete a permission.
        public function destroy(permission $permission) {
    
            $permission->delete();
    
            session()->flash('permission_deleted','permission has been deleted successfuly.');
    
            return back();
        }

}
