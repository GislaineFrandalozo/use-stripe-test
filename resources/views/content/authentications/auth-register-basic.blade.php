@php
$withoutCommonMaster = true;
@endphp

@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth-register.js')}}"></script>
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
        
          <form class="mb-3">
        
            <div id='div-name' class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input required type="text" class="form-control" id="name" name="name" placeholder="Enter your name" autofocus>
            
            </div>
            <div id='div-last_name' class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" autofocus>
            </div>
            <div id='div-email' class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div id='div-password' class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            </div>
          
            <button id='formUserCreate' class="btn btn-primary d-grid w-100">
              Create
            </button>
          </form>
          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ route('auth.create') }}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
