@php
$fullName = $user->name. " " .$user->last_name;
$STRIPE_KEY = env('STRIPE_KEY');
$route = route('user.edit');
@endphp

@extends('layouts/blankLayout')

@section('title', 'Checkout')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Checkout</span> 
</h4>

<div class="row">
  <div class="col-md-12">

  <hr class="my-0">
    <div class="card">
      <div class="card-header">
        <h3> Update Payment Method</h3> 
        <p>  {{ $plan->name }} ${{ number_format($plan->price, 2) }} </p>
      </div>
    
      <div class="mb-3 p-3 col-md-6">
      {{ $fullName }}
      </div>
    
      <div class="card-body" id="card-element"></div>
     
      <div class='col p-3'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button id="card-button" class="btn btn-outline-secondary" data-fullName="{{ $fullName }}" data-stripe="{{ $STRIPE_KEY }}" data-secret="{{ $intent->client_secret }}">
          Assinar
        </button>
        <a href="{{ $route }}" class="btn btn-outline-secondary">Cancel</a> 
      </div>

    </div>
  </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
 
<script>
  const cardButton = document.getElementById('card-button');
  const STRIPE_KEY = cardButton.dataset.stripe;
  const stripe = Stripe(STRIPE_KEY);
</script>

@endsection


@section('page-script')
<script src="{{asset('assets/js/pages-checkout.js')}}"></script>
@endsection