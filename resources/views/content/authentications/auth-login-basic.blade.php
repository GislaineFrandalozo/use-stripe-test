@php
$withoutCommonMaster = true;
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth-login.js')}}"></script>
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <div class="card">
        <div class="card-body">    

          <form id="formAuthentication" class="mb-3"  action="{{ route('auth.store') }}" method="POST">
            
            <div id='div-email' class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
            </div>

            <div id='div-password' class="mb-3">  
              <label class="form-label" for="password">Password</label>          
              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            </div>

            <div class="mb-3">
            <button type='submit' id='formUserCreate' class="btn btn-primary d-grid w-100">
            Sign in
            </button>
            </div>

          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{route('user.create')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
