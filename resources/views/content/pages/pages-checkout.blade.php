@php
$isMenu = false;
$navbarHideToggle = false;
$isNavbar = false;
$isFooter = false;
$fullName = $user->name. " " .$user->last_name;

$route = route('user.edit');
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Checkout')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')



<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Checkout</span> 
</h4>

<div class="row">
  <div class="col-md-12">

  <hr class="my-0">
    <div class="card">
      <div class="card-header">
        <h3 class="card-header"> Update Payment Method</h3> 
        <p>  {{ $plan->name }} ${{ number_format($plan->price, 2) }} </p>
      </div>
    
      <div class="mb-3 p-3 col-md-6">
        <label for="name" class="form-label">Full Name</label>
          <input class="form-control" type="text" id="card-holder-name" name="name" value="{{ $fullName }}" autofocus />
      </div>
      <!-- Stripe Elements Placeholder -->
      <div class="card-body " id="card-element"></div>
     
      <div class='col p-3'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button id="card-button" class="btn btn-outline-secondary" data-secret="{{ $intent->client_secret }}">
          Assinar
        </button>
        <a href="{{ $route }}" class="btn btn-outline-secondary">Cancel</a> 
      </div>

    </div>
  </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
 
<script>
    const stripe = Stripe('pk_test_51N2h9AFWcz9ZHeiFUCS5yJEnqwBJE9r57xhyAHElLxZguOlpat6G22FMb2S1tDaoULH5NwwUwRZPGIJZrYyh7aYk00gsprGOK2');
 
    const elements = stripe.elements();
    const cardElement = elements.create('card');
 
    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
 
    cardButton.addEventListener('click', async (e) => {
    console.log('---> click <---')
    cardButton.disabled = true
    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: { name: cardHolderName.value }
            },
        }
    );
 
    if (error) {
        // Display "error.message" to the user...
        cardButton.disable = false
        console.log(error)
    } else {
        // The card has been verified successfully...
        console.log('---> The card has been verified successfully... <---')
        console.log(setupIntent)
   
        $.ajax({
        url: '/checkout',
        type: 'POST',
        data: setupIntent,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function(response) {
           // window.location.reload()
           console.log('---> success request <---')
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
        });
    }
});
</script>

@endsection

