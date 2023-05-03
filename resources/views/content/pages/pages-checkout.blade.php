@php
$fullName = $user->name. " " .$user->last_name;
$STRIPE_KEY = env('STRIPE_KEY');
$route = route('user.edit');
$withoutCommonMaster = true;
@endphp

@extends('layouts/blankLayout')

@section('title', 'Checkout')

@section('content')

<h4 class="fw-bold p-3 mb-2">
  <span class="text-muted fw-light">Checkout</span> 
</h4>

<div class="row">
  <div class="col-md-12">

  <hr class="my-0">
    <div class="card">
      <div class="card-header">
        <h3> Payment </h3> 
        <p>  {{ $plan->name }} ${{ number_format($plan->price, 2) }} </p>
      </div>
      <div class="px-5 col-md-6">
        <form id="address-form">
          <div id="address-element"></div>    
        </form>
      </div>
      <div class="px-4 col-md-6">
        <div class="card-body" id="card-element"></div>
      </div>
      <div class='col px-4'>
        <button id="card-button" class="btn btn-outline-secondary" data-fullname="{{ $fullName }}" data-stripe="{{ $STRIPE_KEY }}" data-secret="{{ $intent->client_secret }}">
          Ok
        </button>
        <a href="{{ $route }}" class="btn btn-outline-secondary">Cancel</a> 
      </div>

    </div>
  </div>
</div>

@include('_partials/stripe-container')

@endsection


@section('page-script')
<script src="{{asset('assets/js/pages-checkout.js')}}"></script>
@endsection
