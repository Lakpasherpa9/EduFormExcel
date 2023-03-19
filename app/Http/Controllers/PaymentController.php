<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function create()
    {
        return view('khalti');
    }

    public function paidpayments(){
        $payment=payment::all();
        return view ('paidpayment',['payments'=>$payment]);
    }
//send pdf
     public function sendpdf($id){
        $pdfdata=payment::find($id);
       // return view('sendpdf',['data'=>$pdfdata,'id'=>$pdfdata->id,'email'=>$pdfdata->email]);  
         return view('sendpdf',['data'=>$pdfdata]);  
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
           // 'date_of_birth' => 'required|date',
           'faculty' => 'required',
           'program' =>'required',
           'semester' =>'required',
            'email' => 'required|email|unique:payments,email',
            'amount' => 'required|numeric|min:0|max:999999',
        ]);
        if (!$validatedData){
            return back()->with('validationError','Please check your data');
        }else{
        $formData = payment::create($validatedData);
        }
        return redirect('/payment')->with('success', 'Form data has been saved successfully.');
    }
    //khalti status code
    public function paymentdetails(Request $request){
                    
                $args = http_build_query(array(
                    'token' => $request->token,
                    'amount'  => 1000
                    ));

                $url = "https://khalti.com/api/v2/payment/verify/";

                # Make the call using API.
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $headers = ['Authorization: Key test_secret_key_a666340c8f324f69af3a5ad7a99a0ae6'];
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                // Response
                $response = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                //stastus code check
                if ($status_code==200){
                    $payment =new payment();
                    $payment->token = $request->token;
                    $payment->amount = 1000;
                    $payment->status = 'success';
                    $payment->save();
                    return view('Khalti')->with('message','Your payment is successfull');
                }
                else{
                    // $payment = new payment();
                    //     $payment->amount = $request->amount;
                    //     $payment->token = $request->idx;
                    //     $payment->status = 'failure';
                    //     $payment->save();
                    // return view('Khalti')->with('error','Your payment is  unsuccessfull');
                    $failure_data = [
                        'amount' => $request->amount,
                        'token' => $request->idx,
                        'status' => 'failure',
                    ];
                    DB::table('payments')->insert($failure_data);
                    return response()->json(['success' => false]);

                }
        }
}