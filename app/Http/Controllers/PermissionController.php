<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // Function will route to admin/permissions/index  
    public function index () {

        return view('admin.permissions.index');
    }
    
}
