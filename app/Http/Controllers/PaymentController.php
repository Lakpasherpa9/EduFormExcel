<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    public function create()
    {
        return view('khalti');
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
}
