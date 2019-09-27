<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Property;
use App\Parameter;
use Auth;
use DB;

class AdminPagesController extends Controller
{
    protected $property, $booking, $parameter;
    
    public function __construct()
    {

        $this->middleware('auth:admin');


        $this->booking = new Booking();
        $this->property = new Property();
        $this->parameter = new Parameter();
    }
 
    public function index(){
        $title = 'Welcome to Property Inventory Tracker';      
        return view('index')->with('title', $title);
    }

    public function details(){
        $admin_id = Auth::user()->adminId;

        $admins = DB::table('admins')
        ->where('adminId', '=', $admin_id)
        ->get();

        return view('pages.admin.details')->with('admins', $admins);
    }

    public function contact(){
        $title = 'Contact Us';
        return view('pages.admin.contact')->with('title', $title);
    }

    public function pricelist(){
        $title = 'Pricelist';
        return view('pages.admin.pricelist')->with('title', $title);
    }

    public function statements(){
        
        $bookings = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->get();

        return view('pages.admin.statements')->with('bookings', $bookings);
    }

    public function welcome(){
        return view('welcome');
    }

    public function postcode(){
        return view('postcode');
    }
}
