@extends('layouts.dashboard')

@section('DashBoard')
@php
  $referCount = DB::table('users')->where('refered_by', $userInfo->refer_code)->count();
@endphp
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 m-auto">
      <br>
      <br>
      <br>
      <div class="statbox widget box box-shadow">
          <div class="widget-header">
              <div class="row">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>Info About : {{ $userInfo->first_name}} {{ $userInfo->last_name}}</h4>
                      <hr>
                      <p>Total Refer: {{ $referCount }}</p>
                  </div>
              </div>
          </div>
          <div class="widget-content widget-content-area">

              <div class="row">
                  <div class="col-lg-12 col-12 mx-auto">
                      <form action="{!! route('AdminEdit', $userInfo->id) !!}" method="POST">
                        @csrf
                         {{-- @method('patch') --}}
                          <div class="form-group">
                              <p>First Name:</p>
                              <input id="t-text" type="text" name="first_name" class="form-control" required="" value="{{ $userInfo->first_name }}">
                              <br>
                              <p>Last Name:</p>
                              <input id="t-text" type="text" name="last_name" class="form-control" required="" value="{{ $userInfo->last_name }}">
                              <br>
                              <p>E-Mail:</p>
                              <input id="t-text" type="text" name="email" class="form-control" required="" value="{{ $userInfo->email }}">
                              <br>
                              <p>Phone Number:</p>
                              <input id="t-text" type="text" name="phoneNumber" class="form-control" required="" value="{{ $userInfo->phoneNumber }}">
                              <br>
                              <p>Profile Slug:</p>
                                <input id="t-text" type="text" name="profile_slug" class="form-control" required="" value="{{ $userInfo->profile_slug }}">
                              <br>
                              <p>Refer Code:</p>
                              <input id="t-text" type="text" name="refer_code" class="form-control" required="" value="{{ $userInfo->refer_code }}">
                              <br>
                              <p>Refered By:</p>
                              <input id="t-text" type="text" name="refered_by" class="form-control" required="" value="{{ $userInfo->refered_by }}">
                              <br>
                              <p>User Name:</p>
                              <input id="t-text" type="text" name="username" class="form-control" value="{{ $userInfo->username }}">
                              <button type="submit" name="txt" class="mt-4 btn btn-primary">Submit</button>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="">
                @if(!empty($error))
                  <div class="alert alert-success" role="alert">
                    {{ $message }}
                  </div>
                @endif
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
