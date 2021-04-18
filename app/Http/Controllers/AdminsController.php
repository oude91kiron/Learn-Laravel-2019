<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    // Return the view of the admin page
    public function index() {

        return view('admin.index');
    }
}
