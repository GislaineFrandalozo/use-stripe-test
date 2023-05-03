@php
$withoutCommonMaster = $user->hasPaymentMethod() ? true : null;
$STRIPE_KEY = env('STRIPE_KEY');
$fullName = $user->name. " " .$user->last_name;
@endphp

@extends('layouts/blankLayout')

@section('title', 'Account settings - Account')

@section('content')
<h4 class="fw-bold p-3 mb-2">
  <span class="text-muted fw-light">Account Settings </span> 
</h4>

<div class="row">
  <div class="col-md-12">

  <div class="card mb-4">
    <h5 class="card-header">Profile Details</h5> 
      <!-- Account -->
      <hr class="my-0">
      <div class="card-body">
        <form >
          <div class="row">
            <div id='div-name' class="mb-3 col-md-6">
              <label for="name" class="form-label">First Name</label>
              <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}" autofocus />
            </div>
            <div id='div-last_name' class="mb-3 col-md-6">
              <label for="last_name" class="form-label">Last Name</label>
              <input class="form-control" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" />
            </div>
            <div id='div-email' class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}" placeholder="{{ $user->email }}" />
            </div>
          <div class="mt-2">
            <button data-indexnumber="{{ $user->id }}" id="user_update" class="btn btn-primary me-2">Save changes</button>
            <button id="logout" class="btn btn-danger me-2">Logout</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
  </div>
  @if($withoutCommonMaster) 
   <!-- Update Payment -->
  <hr class="my-0">
  <div class="card">
    <div class="card-header">
      <h5> Update Payment Method</h5>
    
      <div class='col p-3'>
      <span class="text-muted fw-light">Your card is </span> 
      <span class="text-muted fw-light">{{ $user->card_brand }} {{ $user->card_last_four }} </span> 
      </div>

     


     
    </div>
    <div class="px-5 col-md-6 justify-center">
        <form id="address-form">
          <div id="address-element"></div>    
        </form>
      </div>
      <div class="px-5 justify-center col-md-6">
        <div class="card-body" id="card-element"></div>
      </div>
      <div class='col p-3'>
         <form>
          <button id="card-button" class="btn btn-outline-secondary" data-stripe="{{ $STRIPE_KEY }}" data-fullName="{{ $fullName }}" data-secret="{{ $intent->client_secret }}" >
          Save changes
          </button>
        </form>
      </div>
    </div>
  </div>
 <!-- /Update Payment -->
 @endif

</div>

@include('_partials/stripe-container')

@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection