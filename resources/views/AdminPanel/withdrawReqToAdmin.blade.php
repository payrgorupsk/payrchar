@extends('layouts.dashboard')

@section('DashBoard')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="col-md-8">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                   <div class="col-md-12 center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed mb-4">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>Name</th>
                                    <th>Account Type</th>
                                    <th>Account Number</th>
                                    <th>Ammount</th>
                                    <th>Token ID</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($notAcceptedReq as $value)
                                @php
                                $users = DB::table('users')->where('id', $value->user_id)->first();
                                @endphp
                                <tr>
                                    <td>{{$loop->index+1    }}</td>
                                    <td><a href="{!! route('my_profile',$users->profile_slug) !!}">{{ $value->user_name }}</a></td>
                                    <td>{{ $value->accountType }}</td>
                                    <td>{{ $value->accountNumber }}</td>
                                    <td>{{ $value->ammount }}</td>
                                    <td>{{ $value->token_number }}</td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li><a href="{!! route('Approve-Request',$value->id) !!}" data-toggle="tooltip" data-placement="top" title="Approve"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></li>
                                            <li><a href="{!! route('Delete-Request',$value->id) !!}" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                  <th>Sl.no</th>
                                  <th>Name</th>
                                  <th>Account Type</th>
                                  <th>Account Number</th>
                                  <th>Ammount</th>
                                  <th>Token ID</th>
                                  <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>


                  <h1>Paid Users</h1>
                   <div class="col-md-12 center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed mb-4">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>Name</th>
                                    <th>Account Type</th>
                                    <th>Account Number</th>
                                    <th>Ammount</th>
                                    <th>Token ID</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($AcceptedReq as $value)
                                <tr>
                                    <td>{{$loop->index+1    }}</td>
                                    <td>{{ $value->user_name }}</td>
                                    <td>{{ $value->accountType }}</td>
                                    <td>{{ $value->accountNumber }}</td>
                                    <td>{{ $value->ammount }}</td>
                                    <td>{{ $value->token_number }}</td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li><a href="{!! route('Delete-Request',$value->id) !!}" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                  <th>Sl.no</th>
                                  <th>Name</th>
                                  <th>Account Type</th>
                                  <th>Account Number</th>
                                  <th>Ammount</th>
                                  <th>Token ID</th>
                                  <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection
