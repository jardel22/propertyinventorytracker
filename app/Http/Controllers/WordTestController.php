<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordTestController extends Controller
{
    public function createWordDocx()
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('InventoryReportTemplatePIT.docx'));

        $templateProcessor->setValue('ADDRESSLINE1', 'THIS IS');
        $templateProcessor->setValue('CITY', 'A');
        $templateProcessor->setValue('POSTCODE', 'TEST');
       
       
        $export_file = public_path('filename.docx');

        $templateProcessor->saveAs($export_file);
        return response()->download($export_file)->deleteFileAfterSend(true);
       
    }

}