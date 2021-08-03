<?php

use App\Http\Controllers\User\MessageController;
use App\Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
    ->namespace('User')
    ->name('user.')
    ->prefix('user')
    ->group(function(){
        Route::get('/','HomeController@index')->name('home');
        Route::resource('/house', 'HouseController');
        Route::resource('/message', 'MessageController');
        Route::get('/sponsor/{house}', 'SponsorController@index')->name('sponsor');
        Route::get('/success', 'SuccessController@success')->name('success');
        Route::post('/sponsor', 'SponsorController@store')->name('sponsor.store');
        Route::patch('/sponsor/{house}', 'SponsorController@store')->name('sponsor.update');
    });

/* Route::get('/payment/{payment}', 'PaymentController@payment')->name('payment'); */
   
Route::get('/payment/{payment}',  function(Request $request, $id){

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();

    $payment = Payment::find($id);
    

    return view('user/house/checkout', compact('payment', 'token'));
})->name('payment');

Route::post('/checkout/{id}', function (Request $request, $id){
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;
    
    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
        ]);
        if ($result->success) {
            $transaction = $result->transaction;
        
        $payment = Payment::find($id);
        $payment->transaction_id = $transaction->id;
        $payment->status = 'paid';
        $payment->save();
            return redirect()->route('user.success');
            //return redirect('/success')->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
        } else {
            $errorString = "";

            foreach  ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }


            //$_SESSION["errors"] = $errorString;
            //header("Location: index.php");

            return back()->withErrors('An error occurred with the message: ' .$result->message);
        }
})->name('checkout');




Route::get('{any?}', function(){
        return view('guest.home');
    })->where('any','.*');



  

