<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        // Alternative: return \inertia('VueComponent', [prop => value])
        return Inertia::render('Home',  [
             'title' => 'Home page'
        ]);

//        to return selected data into blade component (app.blade)
//        ])->withViewData([
//            'title' => 'Home page'
//        ]);
    }

    public function about()
    {
        // Alternative: return \inertia('VueComponent', [prop => value])
        return Inertia::render('About',  [
            'title' => 'About page'
        ]);
    }
}
