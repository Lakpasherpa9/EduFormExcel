<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailPdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPDFMail;
use PDF;
// use Barryvdh\DomPDF\Facade as PDF;

class pdfController extends Controller
{
    
    public function index($id,$email) {
        // $product = MailPdf::all();
        $product = MailPdf::find($id);
       $data['product'] = $product;
        $pdf = PDF::loadView('sendpdf', $data);
        // $to_email = "sachinshrestha@kcc.edu.np";
        Mail::to($email)->send(new SendPDFMail($pdf));
        // return response()->json(['status' => 'success', 'message' => 'Report has been sent successfully to.'.$email]);
         return redirect()->back()->with('success','Admit card has been sent to'.$email);
        // return view('sendpdf',['data'=>$product])->with('success', 'Admit card sent to '.$email);  
      }

}