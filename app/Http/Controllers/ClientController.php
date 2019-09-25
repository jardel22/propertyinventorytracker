<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Booking;
use App\Property;
use App\Parameter;
use App\Client;
use Auth;
use DB;

class ClientController extends Controller
{
    protected $property, $booking, $parameter;
    
    public function __construct()
    {

        $this->middleware('auth:web');


        $this->booking = new Booking();
        $this->property = new Property();
        $this->parameter = new Parameter();
    }

    public function email() 
    {
        $client_id = Auth::user()->clientId;

        $clients = DB::table('clients')
        ->where('clientId', '=', $client_id)
        ->get();

        return view('pages.user.changeEmail')->with('clients', $clients);
    }

    public function updateEmail(Request $request)
    {
    }
    
    public function password() 
    {
        $client_id = Auth::user()->clientId;

        $clients = DB::table('clients')
        ->where('clientId', '=', $client_id)
        ->get();

        return view('pages.user.changePassword')->with('clients', $clients);
    }

    public function updatePassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->repeatPassword;
        
        if(!Hash::check($oldPassword, Auth::user()->password && $newPassword !== $confirmPassword)){
            return back()->with('error','The current password does not match the database password AND The confirmed password does not match the password, please try again!'); //when user enter wrong password as current password
        }
        
        else if(!Hash::check($oldPassword, Auth::user()->password)){
            return back()->with('error','The current password does not match the database password'); //when user enter wrong password as current password
        }
        
        else if($newPassword !== $confirmPassword){
            return back()->with('error','The confirmed password does not match the password, please try again!'); //when user enter wrong password as current password
        }



        else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
            return redirect('/details')->with('success','Password has been updated');
        }        
    }
}