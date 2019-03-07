<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public function getIndex()
    {
        return view('roles');
    }
}
