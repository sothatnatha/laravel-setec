<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    //
    public function notfound()
    {
        return view('admin.notfound.404');
    }

}
