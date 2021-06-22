@extends('layouts.dashboard')

@section('DashBoard')
@php
  $users = DB::table('users')->paginate(50);
@endphp
<div id="content" class="main-content">
  <br>
  <br>
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">New users</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">First Name</div></th>
                                                <th><div class="th-content">E-Mail</div></th>
                                                <th><div class="th-content th-heading">Total point</div></th>
                                                <th><div class="th-content">Registered At</div></th>
                                                <th><div class="th-content">Action</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($users as $value)
                                            <tr>
                                                <td><div class="td-content customer-name"><img src="{{asset('uploads/profile_pictures/')}}/{{ $value->profile_picture }}" alt="avatar">{{ $value->first_name }} {{ $value->last_name }}</div></td>
                                                <td><div class="td-content customer-email">{{ $value->email }}</div></td>
                                                @php
                                                $points = DB::table('points')->where('user_id', $value->id)->value('tota_point');
                                                @endphp
                                                <td><div class="td-content pricing"><span class="">{{ $points }}</span></div></td>
                                                <td><div class="td-content"><span class="badge outline-badge-primary">{{ $value->created_at }}</span></div></td>
                                                <td><div class="td-content"> <a type="button" href="{!! route('AdminEdit',$value->id) !!}" class="btn btn-primary">Edit</a> <a type="button" href="#" class="btn btn-primary">Delete</a></div></td>
                                            </tr>
                                            @endforeach
                                            <div class="col-md-3 m-auto">
                                              <a href="{{ $users->previousPageUrl() }}" class="btn btn-outline-primary mb-3"> << </a>
                                              <a href="{{ $users->nextPageUrl() }}" class="btn btn-outline-primary mb-3"> >> </a>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>

@endsection
