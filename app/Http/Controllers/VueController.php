<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class VueController extends Controller
{
    public function vueApp() {
        if (Auth::check()) {
            return view('vue-app');
        } else {
            return redirect('/');
        }
    }
}
