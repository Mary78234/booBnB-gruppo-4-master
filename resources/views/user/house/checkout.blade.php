@extends('layouts.app')

@section('content')
<div class="container">
    


   @if(session('success_message'))
   <div class="alert alert-success">
     {{session('success_message')}}
     {{-- <a href="/dashboard">ritorna alla tua dashboard</a> --}}
   </div>
 @endif
 @if(count($errors)>0)
   <div class="alert alert-danger">
     <ul>
       @foreach ($errors->all as $error)
         <li>{{$error}}</li>
       @endforeach
     </ul>
   </div>
 @endif
 <form class=" mt-5" method="post" id="payment-form" action="{{route('checkout', $payment->id)}}">
   @csrf
     <section>
         <label for="amount">
             <span class="input-wrapper amount-wrapper">Amount</span>
                 <div class="input-wrapper amount-wrapper">
                 <input class="form-control"  id="amount" name="amount" type="tel" min="1" placeholder="Amount"  value="@if ($payment['sponsor_id']==1)2.99 @elseif ($payment['sponsor_id']==2)5.99 @elseif($payment['sponsor_id']==3)9.99 @endif">
                </div>
         </label>

         <div class="bt-drop-in-wrapper">
             <div id="bt-dropin"></div>
         </div>
     </section>

     <input id="nonce" name="payment_method_nonce" type="hidden">
     <button class="btn btn-success" type="submit"><span>Transaction</span></button>
 </form>

   
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";
    
    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        paypal: {
            flow: 'vault'
        }
    }, function (createErr, instance){
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if(err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }

                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            })
        })
    })

</script>

@endsection