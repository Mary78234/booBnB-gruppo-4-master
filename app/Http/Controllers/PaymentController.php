<?php

namespace App\Http\Controllers;

use App\House;
use App\Payment;
use App\Sponsor;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request, $id){

       
        $payment = Payment::find($id);
        

        return view('user/house/checkout', compact('payment'));
    }
}