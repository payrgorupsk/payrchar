@extends('layouts.dashboard')

@section('custom_css')
<link href="{{ asset('public/adminAssets/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('DashBoard')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">

            <div class="widget-heading m-2 my-4 text-center">
                <h5 class="text-black pt-4">Withdrawal details</h5>
            </div>
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="widget-content m-3">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Account Type</th>
                                    <th>Request Point</th>
                                    <th>Amount</th>
                                    <th>UUID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdrawarlReqList as $value)
                                @php
                                    $users = DB::table('users')->where('id', $value->user_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $users->first_name }}</td>
                                    <td>{{ $value->withdraw_with }}</td>
                                    <td>{{ $value->request_point }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>{{ $value->uuid }}</td>
                                    <td>{{ $value->status }}</td>
                                    <td><ul class="table-controls">
                                        <li><a href="{!! route('Approve-Request',$value->id) !!}" data-toggle="tooltip" data-placement="top" title="Approve"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></li>
                                        <li><a href="{!! route('Delete-Request',$value->id) !!}" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                    </ul></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Account Type</th>
                                    <th>Request Point</th>
                                    <th>Amount</th>
                                    <th>UUID</th>
                                    <th>Status</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection