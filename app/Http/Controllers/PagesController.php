<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Property Inventory Tracker';      
        return view('index')->with('title', $title);
    }

    public function details(){
        $title = 'My Details';
        return view('pages.user.details')->with('title', $title);
    }

    public function contact(){
        $title = 'Contact Us';
        return view('pages.user.contact')->with('title', $title);
    }

    public function pricelist(){
        $title = 'Pricelist';
        return view('pages.user.pricelist')->with('title', $title);
    }

    public function statements(){
        $title = 'Statements';
        return view('pages.user.statements')->with('title', $title);
    }

    public function welcome(){
        return view('welcome');
    }

    public function postcode(){
        return view('postcode');
    }
}
