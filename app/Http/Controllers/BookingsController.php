<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Property;
use App\Parameter;
use Auth;
use DB;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class BookingsController extends Controller
{
    protected $property, $booking, $parameter;
    
    public function __construct()
    {

        $this->middleware('auth:web');


        $this->booking = new Booking();
        $this->property = new Property();
        $this->parameter = new Parameter();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_id = Auth::user()->clientId;

        $book = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->where('bookings.bookingId', '=', $bookingId)
        ->where('clients.clientId', '=', $client_id)
        ->get();
        
        //Booking::orderBy('created_at', 'desc')->get();
        return view('bookings.user.dashboard')->with('bookings', $bookings);
        
    }

    // public function dashboard()
    // {
    //     $user_id = Auth::user()->id;



    //     $bookings = DB::table('bookings')
    //     ->join('users', 'bookings.user_id', '=', 'users.id')
    //     ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
    //     ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')                
    //     ->where('users.id', '=', $user_id)
    //     ->get();
        
    //     //Booking::orderBy('created_at', 'desc')->get();
    //     return view('bookings.user.dashboard')->with('bookings', $bookings);
    // }

    public function calendar()
    {
        $bookings = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->join('clerks', 'bookings.clerk_id', '=', 'clerks.clerkId')
        ->where('bookings.approved', '=', '1')
        ->get();

        // if($data->count())
        // {
        //     foreach ($data as $key => $value) 
        //     {
        //         $bookings[] = Calendar::event(
        //             $value->addressLine1,
        //             false,
        //             new \DateTime($value->startTime),
        //             new \DateTime($value->endTime),
        //             null,
        //             // Add color
        //             [
        //                 'color' => '#0073e5',
        //                 'textColor' => '#000000',
        //             ]
        //         );
        //     }
        // }
        // $calendar = Calendar::addEvents($bookings);
        // // ->setOptions([ //set fullcalendar options
        // //     'firstDay' => 1
        // // ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        // //     'dayClick' => 'function(bookings) {
        // //         title = booking.title;
        // //      }'
        // // ]); 
        return view('bookings.user.calendar', compact ('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $starttime = $request->date.' '.$request->time;
        $endtime = date('Y:m:d H:i:s', strtotime($starttime)+7200);
        echo $endtime;

        date_default_timezone_set('Europe/London');
        $today = date('d/m/y');




        $client_id = Auth::user()->clientId;
        DB::beginTransaction();

        $this->validate($request, [
            'jobType' => 'required', //NEW FIELD - done
            'date' => 'required|date|after:yesterday',
            'time' => 'required',
            'addressLine1' => 'required',
            'city' => 'required',
            'county' => 'required', //NEW FIELD
            'postcode' => 'required',
            'bedrooms' => 'required',
            'garage' => 'required',
            'electricityMeterLocation' => 'required',
            'waterMeterLocation' => 'required',
            'gasMeterLocation' => 'required',
            'purchaseOrderNumber' => 'required',
            'specialInstructions' => 'required'
        ]);
        
       
         
        
        try{
        $property = $this->property->create([
            'addressLine1' => $request->addressLine1,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'county' => $request->county
        ]);

        $parameter = $this->parameter->create([
            'bedrooms' => $request->bedrooms,
            'garage' => $request->garage,
            'furnished' => $request->furnished,
            'gasMeterLocation' => $request->gasMeterLocation,
            'electricityMeterLocation' => $request->electricityMeterLocation,
            'waterMeterLocation' => $request->waterMeterLocation,
            'purchaseOrderNumber' => $request->purchaseOrderNumber,
            'specialInstructions' => $request->specialInstructions,
            'property_id' => $property->propertyId
        ]);



        $booking = $this->booking->create([
            'startTime' => $starttime,
            'endTime' => $endtime,
            'client_id' => $client_id,
            'property_id' => $property->propertyId,
            'jobType' => $request->jobType
        ]);

        if($booking && $property && $parameter){
            DB::commit();
        } else {
            DB::rollback();
        }
        return redirect('/bookings')->with('success', 'Booking Requested Successfully');
        }
        catch(Exception $exception){
            DB::rollback();
            return redirect()->back();
        }
    }

    // public function approve(Request $req, $bookingId)
    // {
        
    //     $booking = Booking::find($bookingId);
    //     $approve = $req->approve;
    //     $status = $req->status;

    //     if($approve== 'on'){
    //         $approve = 1;
    //         $status = "Pending";

    //     } 
        
    //     else {
    //         $approve=0;
    //         $status="Requested";
    //     }

    //     $booking->approved= $approve;
    //     $booking->status = $status;
    //     $booking->save();       

    //     return back();
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bookingId)
    {
        $client_id = Auth::user()->clientId;

        $book = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->where('bookings.bookingId', '=', $bookingId)
        ->where('clients.clientId', '=', $client_id)
        ->get();

        return view('bookings.user.show')->with('bookings', $book);
    }

    public function showPortal($bookingId)
    {
        $client_id = Auth::user()->clientId;

        $book = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->where('bookings.bookingId', '=', $bookingId)
        ->where('clients.clientId', '=', $client_id)
        ->get();

        return view('bookings.user.portal')->with('bookings', $book);
    }

    public function updatePortal(Request $request, $bookingId)
    {
        $booking = Booking::find($bookingId);

        
        $booking->status ="Completed";
        $booking->save();
        
        $comments = $request->propertyId;
        $parameter = Parameter::where('property_id', $request->propertyId)->first();

        $parameter->comments = $request->comments;
        $parameter->save();
        
        return redirect('/bookings')->with('success', 'Booking Process Completed Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy($id)
    {
        // delete
        $booking = Booking::find($id);
        $booking->delete();

        // redirect
        return redirect('/bookings')->with('success', 'Successfully deleted the booking!');
    }
}
