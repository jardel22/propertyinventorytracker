<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Property;
use App\Parameter;
use Auth;
use DB;

class PagesController extends Controller
{
    protected $property, $booking, $parameter;
    
    public function __construct()
    {

        $this->middleware('auth:web');


        $this->booking = new Booking();
        $this->property = new Property();
        $this->parameter = new Parameter();
    }
 
    public function index(){
        $title = 'Welcome to Property Inventory Tracker';      
        return view('index')->with('title', $title);
    }

    public function details(){
        $client_id = Auth::user()->clientId;

        $clients = DB::table('clients')
        ->where('clientId', '=', $client_id)
        ->get();

        return view('pages.user.details')->with('clients', $clients);
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
