@extends('layouts.dashboard')

@section('custom_css')
<link href="{{ asset('public/adminAssets/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('DashBoard')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">
            <br><br>
            <div class="widget-heading">
                <h5 class="">Users</h5>
            </div>
            
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">Picture</div>
                                </th>
                                <th>
                                    <div class="th-content">Username</div>
                                </th>
                                <th>
                                    <div class="th-content">Total Point</div>
                                </th>
                                <th>
                                    <div class="th-content">Email</div>
                                </th>
                                <th>
                                    <div class="th-content">Phone</div>
                                </th>
                                <th>
                                    <div class="th-content">Registered At</div>
                                </th>
                                <th>
                                    <div class="th-content">Actions</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if(!empty($user->profile_image) && file_exists('public/uploads/'.$user->profile_image))
                                    <div class="td-content customer-name"><img src="{{ asset('public/uploads/'.$user->profile_image) }}" alt="Profile Image" height="80px" width="80px"></div>
                                    @else
                                    <div class="td-content customer-name"><img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Image" height="80px" width="80px"></div>
                                    @endif
                                </td>
                                <td>
                                    <div class="td-content"><span class="" style="font-weight: bold; font-size: 17px">{{ $user->first_name }} {{ $user->last_name }}</span></div>
                                </td>
                                <td>
                                    <div class="td-content"></div>
                                </td>
                                <td>
                                    <div class="td-content">{{ !empty($user->email) ?$user->email : 'No email found' }}</div>
                                </td>
                                <td>
                                    <div class="td-content">{{ !empty($user->phone) ? $user->phone : 'No phone found' }}</div>
                                </td>
                                <td>
                                    <div class="td-content">{{ $user->created_at }}</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="{{ url('/user', $user->id) }}" class="btn btn-primary">Details</a></div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <br>
                    <a href="{{ $users->previousPageUrl() }}" class="btn btn-primary"><<&nbsp; Previous</a>
                    <a href="{{ $users->nextPageUrl() }}" class="btn btn-primary float-right">Next &nbsp;>></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection