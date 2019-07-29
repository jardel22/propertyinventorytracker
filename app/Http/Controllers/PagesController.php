<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Property Inventory Tracker';      
        return view('pages.index')->with('title', $title);
    }

    public function details(){
        $title = 'My Details';
        return view('pages.details')->with('title', $title);
    }

    public function contact(){
        $title = 'Contact Us';
        return view('pages.contact')->with('title', $title);
    }

    public function pricelist(){
        $title = 'Pricelist';
        return view('pages.pricelist')->with('title', $title);
    }

    public function statements(){
        $title = 'Statements';
        return view('pages.statements')->with('title', $title);
    }
}
