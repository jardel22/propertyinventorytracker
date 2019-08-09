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
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        // // $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('bookings.user.index')->with('bookings', $bookings);
        
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;



        $bookings = DB::table('bookings')
        ->join('users', 'bookings.user_id', '=', 'users.id')
        ->join('properties', 'bookings.property_id', '=', 'properties.id')                
        ->where('bookings.user_id', '=', $user_id)
        ->get();
        
        //Booking::orderBy('created_at', 'desc')->get();
        return view('bookings.user.dashboard')->with('bookings', $bookings);
    }

    public function calendar()
    {
        $bookings = [];
        $data = DB::table('bookings')
        ->join('users', 'bookings.user_id', '=', 'users.id')
        ->join('properties', 'bookings.property_id', '=', 'properties.id')
        ->where('bookings.approved', '=', '1')
        ->get();

        if($data->count())
        {
            foreach ($data as $key => $value) 
            {
                $bookings[] = Calendar::event(
                    $value->addressLine1,
                    false,
                    new \DateTime($value->startTime),
                    new \DateTime($value->endTime),
                    null,
                    // Add color
                    [
                        'color' => '#0073e5',
                        'textColor' => '#000000',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($bookings);
        return view('bookings.user.calendar', compact ('calendar'));
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




        $user_id = Auth::user()->id;
        DB::beginTransaction();

        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'addressLine1' => 'required',
            'city' => 'required',
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
            'postcode' => $request->postcode
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
            'property_id' => $property->id
        ]);



        $booking = $this->booking->create([
            'startTime' => $starttime,
            'endTime' => $endtime,
            'user_id' => $user_id,
            'property_id' => $property->id
        ]);

        if($booking && $property && $parameter){
            DB::commit();
        } else {
            DB::rollback();
        }
        return redirect('/bookings/dashboard')->with('success', 'Booking Request Created');
        }
        catch(Exception $exception){
            DB::rollback();
            return redirect()->back();
        }
    }

    public function approve(Request $req)
    {
        
        $booking = Booking::find($req->bookingId);
        $approve = $req->approve;
        $status = $req->status;

        if($approve== 'on'){
            $approve = 1;
            $status = "Pending";

        } 
        
        else {
            $approve=0;
            $status="Requested";
        }

        $booking->approved= $approve;
        $booking->status = $status;
        $booking->save();       

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $booking = Booking::find($id);
        // return view('bookings.user.show')->with('booking', $booking);
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
        //
    }
}
