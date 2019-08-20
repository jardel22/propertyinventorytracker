<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClerkBooking;
use App\Property;
use App\Parameter;
use App\Clerk;
use App\File;
use Auth;
use DB;

class WordCreationController extends Controller
{
    protected $property, $booking, $parameter;
    public function __construct()
    {

        $this->middleware('auth:clerk');


        $this->booking = new ClerkBooking();
        $this->property = new Property();
        $this->parameter = new Parameter();
    }

    public function showUploadForm($bookingId)
    {
        $booking = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->where('bookings.bookingId', '=', $bookingId)
        ->get();

        return view('bookings.clerk.upload')->with('bookings', $booking);
    }


    public function storeFile(request $request, $bookingId)
    {
        

        if ($request->hasFile('file')) {
           
            
           
            $filename = $request->clientFirstname.' '.$request->clientLastname.' '.$request->bookingId.' '.$request->jobType.' Report';
            $filesize = $request->file->getClientSize();
            $request->file->storeAs('public/upload',$filename);
            
            $file = new File;

            $booking = ClerkBooking::find($bookingId);


            $file->name = $filename;
            $file->size = $filesize;
            
            $file->save();
            
            $booking->status="Check in portal";
            $booking->file_id=$file->fileId;
            $booking->save();
        }

        $this->validate($request, [
            'file' => 'required'
        ]);
        
        return redirect()->route('clerk.bookings.dashboard')->with('success','File Uploaded Successfully');
        
    }

    public function show($bookingId)
    {
        $booking = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->where('bookings.bookingId', '=', $bookingId)
        ->get();

        return view('bookings.clerk.upload')->with('bookings', $booking);
    }



    public function createWordDocx($bookingId)
    {
        $bookings = DB::table('bookings')
        ->join('clients', 'bookings.client_id', '=', 'clients.clientId')
        ->join('properties', 'bookings.property_id', '=', 'properties.propertyId')
        ->join('parameters', 'properties.propertyId', '=', 'parameters.property_id')
        ->join('clerks', 'bookings.clerk_id', '=', 'clerks.clerkId')
        ->where('bookings.bookingId', '=', $bookingId)
        ->get();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('InventoryReportTemplatePIT.docx'));
        

        foreach($bookings as $booking)
        {
            date_default_timezone_set('Europe/London');
            $ldate = date('d/m/y H:i:s');
            $sdate = date('d/m/y');
                
            $templateProcessor->setValue('BOOKINGID', $booking->bookingId);
            $templateProcessor->setValue('ADDRESSLINE1', $booking->addressLine1);
            $templateProcessor->setValue('CITY', $booking->city);
            $templateProcessor->setValue('COUNTY', $booking->county);
            $templateProcessor->setValue('POSTCODE', $booking->postcode);
            $templateProcessor->setValue('CREATEDAT', $ldate);
            $templateProcessor->setValue('CREATED_AT', $sdate);

            $templateProcessor->setValue('CLERKPHONENUMBER', $booking->clerkPhoneNumber);
            $templateProcessor->setValue('BUSINESSADDRESSLINE1', 'OFFICE 2 BEECHWOOD HOUSE' );
            $templateProcessor->setValue('BUSINESSADDRESSLINE2', '1 COURTENAY GARDENS' );
            $templateProcessor->setValue('BUSINESSADDRESSLINE3', 'BIRMINGHAM' );
            $templateProcessor->setValue('BUSINESSADDRESSLINE4', 'B43 6LJ' );
        }
       
        $export_file = public_path('PIT_Inventory_Report.docx');

        $templateProcessor->saveAs($export_file);
        return response()->download($export_file)->deleteFileAfterSend(true);
       
    }

}