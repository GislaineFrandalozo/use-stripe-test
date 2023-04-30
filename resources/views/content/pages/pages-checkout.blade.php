@php
$isMenu = false;
$navbarHideToggle = false;
$isNavbar = false;
$isFooter = false;

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
      <div class="card-body">
   
        <a href="{{ $route }}" class="btn btn-outline-secondary">Cancel</a> 
      </div>
  </div>
</div>



@endsection

