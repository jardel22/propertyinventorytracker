<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClerkBooking;
use App\Property;
use App\Parameter;
use App\Clerk;
use Auth;
use DB;

class ClerkBookingsController extends Controller
{
    protected $property, $booking, $parameter;
    public function __construct()
    {

        $this->middleware('auth:clerk');


        $this->booking = new ClerkBooking();
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
        // $bookings = ClerkBooking::orderBy('created_at', 'desc')->paginate(10);
        // // // $bookings = Booking::orderBy('created_at', 'desc')->get();
        // return view('bookings.clerk.index')->with('bookings', $bookings);

        $bookings = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->orderBy('bookings.starttime', 'desc')
        ->paginate(10);
        
        //Booking::orderBy('created_at', 'desc')->get();
        return view('bookings.clerk.dashboard')->with('bookings', $bookings);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.clerk.create');
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




        $client_id = Auth::user()->clientId;
        DB::beginTransaction();

        $this->validate($request, [
            'date' => 'required',
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
            'client_id' => $request->clientId,
            'property_id' => $property->propertyId,
            'jobType' => $request->jobType
        ]);

        if($booking && $property && $parameter){
            DB::commit();
        } else {
            DB::rollback();
        }
        return redirect('/clerk/bookings')->with('success', 'Booking Added Successfully');
        }
        catch(Exception $exception){
            DB::rollback();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bookingId)
    {
        $booking = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->where('bookings.bookingId', '=', $bookingId)
        ->get();

        return view('bookings.clerk.show')->with('bookings', $booking);
    }

    public function calendar()
    {
        $bookings = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->join('clerks', 'bookings.clerk_id', '=', 'clerks.clerkId')
        ->where('bookings.approved', '=', '1')
        ->get();

        
        return view('bookings.clerk.calendar', compact ('bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bookingId)
    {
        $booking = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id') 
        ->where('bookings.bookingId', '=', $bookingId)
        ->get();

        return view('bookings.clerk.edit')->with('bookings', $booking);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookingId)
    {
        $this->validate($request, [
            // 'startTime' => 'required',
            // 'endTime' => 'required',
            'clerk' => 'required',
        ]);
        
        $approve = $request->approve;
        $status;

        if($approve== 'on'){
            $approve = true;
            $status = "Pending";

        } 
        
        else {
            $approve=false;
            $status="Requested";
        }
        $newApprove = $approve;

        $booking = ClerkBooking::find($bookingId);
        // $booking->startTime = $request->get('startTime');
        // $booking->endTime = $request->get('endTime');
        $booking->approved = $newApprove;
        $booking->status = $status;
        $booking->clerk_id = $request->get('clerk');
        $booking->save();
        return redirect()->route('clerk.bookings.dashboard')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
