<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClerkBooking;
use App\File;
use Auth;
use DB;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('bookings.clerk.upload');
    }


    // public function storeFile(request $request)
    // {
    //     if ($request->hasFile('file')) {
    //         return 'yes';
    //     }

    //     return $request->all();
        
    // }
}
