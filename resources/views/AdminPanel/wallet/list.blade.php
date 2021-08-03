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
                <h5 class="text-black pt-4">Users Wallet details</h5>
            </div>

            <div class="widget-content m-3">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Point</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userWalletDetails as $userWallet)
                                @php
                                    $balance = $userWallet->balanceCalculate($userWallet->point, 'USD');
                                @endphp
                                <tr>
                                    <td>{{ $userWallet->user->first_name }} {{ $userWallet->user->last_name }}</td>
                                    <td>{{ $userWallet->user->email }}</td>
                                    <td>{{ $userWallet->point }}</td>
                                    <td>{{ number_format((float)$balance, 4, '.', '') }}</td>
                                    <td>
                                        <a href="#" class="text-blue">
                                            <i class="uil-edit-alt mr-1"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
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