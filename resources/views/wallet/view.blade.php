@extends('layouts.app')
@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('public/css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<style>
    .uil-image,
    .uil-video {
        color: #007bff;
        margin-top: 8px;
    }

    .post-new-tab-nav {
        padding-bottom: 0;
    }

</style>
@endsection
@section('content')
<div class="main_content">
    <div class="main_content_inner">
        <div class="profile">
            <div class="profile-cover">

                <!-- profile cover -->
                <img src="{{ asset('public/uploads/profile/demo-cover.jpg') }}" alt="Cover photo">

                <!-- <a href="#"> <i class="uil-camera"></i> Edit </a> -->

            </div>

            <div class="profile-details">
                <div class="profile-image">
                    @if(!empty($userProfile->profile_image) &&
                    file_exists('public/uploads/'.$userProfile->profile_image))
                    <img src="{{ asset('public/uploads/'.$userProfile->profile_image) }}" alt="Profile Photo">
                    @else
                    <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Photo">
                    @endif
                </div>
                <div class="profile-details-info uk-card-default py-2">
                    <h1> {{ $userWallet->user->first_name }} {{ $userWallet->user->last_name }}</h1>
                    <div class="my-4">
                        <h6>My Points: <span>#</span><span>{{ $userWallet->point }}</span></h6>
                    </div>
                    <div class="mb-4">
                        <h6>Current balance: <span>$</span><span id="balance">{{ $totalBalance }}</span></h6>
                    </div>
                </div>
            </div>
            @if ($userWallet->point > 0)

            <!-- column two -->
            <div class="uk-card-default px-5 py-4">
                <div class="mb-4 uk-text-center">
                    <h4 class="mb-0">Withdraw your Balance</h4>
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

                <form class="uk-child-width-1-1 uk-grid-small" uk-grid id="payout_form" method="POST" action="{{ url('/wallet/show') }}">
                    @csrf

                    <div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">Select Withdraw Method</label>

                            <div class="uk-position-relative w-100">
                                <select class="uk-select" name="type" id="type">
                                    <option value="paypal">Paypal</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div id="paypalForm1">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="p_amount" class="form-control" id="amount">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="mobileForm">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" id="mobile">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="m_amount" class="form-control" id="amount">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bankForm">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="account" class="form-label">Account Number</label>
                                <input type="text" name="account" class="form-control" id="account">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="swift" class="form-label">Swift code</label>
                                <input type="text" name="swift" class="form-control" id="swift">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="iban" class="form-label">IBAN</label>
                                <input type="text" name="iban" class="form-control" id="iban">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="b_amount" class="form-control" id="amount">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="withdrawal">Request withdrawal</button>
                        </div>
                    </div>

                </form>
            </div><!--  End column two -->
                            
            @endif
            <div class="uk-card-default px-5 py-4">
                <div class="mb-4">
                    <h4 class="mb-0"> <i class="fa fa-history"></i> Payment History</h4>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL no</th>
                            <th>Point</th>
                            <th>Amount</th>
                            <th>Withdraw with</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($requestWithdraw as $req)
                        <tr class="align">
                            <td>#{{ $i++ }}</td>
                            <td>{{ $req->request_point }}</td>
                            <td>${{ $req->amount }}</td>
                            <td>{{ ucfirst($req->withdraw_with) }}</td>
                            <td>{{ $req->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $requestWithdraw->links() }}
            </div>

        </div>
    </div>
    @endsection

    @section('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
        $(document).ready(function(){
            $('#bankForm').hide();
            $('#mobileForm').hide();
            $('#paypalForm1').show();

            if($('#balance').text() < 0.25) {
                $('#withdrawal').prop('disabled', true);
            }
        });

        $('#type').on('change', function()
        {
            if ($('option:selected', this).text() == 'Paypal')
            {
                $('#bankForm').hide();
                $('#mobileForm').hide();
                $('#paypalForm1').show();
            }
            else if ($('option:selected', this).text() == 'Rocket')
            {
                $('#mobileForm').show();
                $('#paypalForm1').hide();
                $('#bankForm').hide();
            }
            else if ($('option:selected', this).text() == 'Bkash')
            {
                $('#mobileForm').show();
                $('#paypalForm1').hide();
                $('#bankForm').hide();
            }
            else if ($('option:selected', this).text() == 'Nagad')
            {
                $('#mobileForm').show();
                $('#paypalForm1').hide();
                $('#bankForm').hide();
            }
            else if ($('option:selected', this).text() == 'Bank')
            {
                $('#mobileForm').hide();
                $('#paypalForm1').hide();
                $('#bankForm').show();
            }
        });

        jQuery.extend(jQuery.validator.messages, {
            required: "{{__('This field is required.')}}",
        });


    $('#payout_form').validate({
        rules: {
            amount: {
                required: true
            }
        },
        submitHandler: function (form)
        {
            $("#withdrawal").attr("disabled", true);

            form.submit();
            setTimeout(function(){
                $("#withdrawal").removeAttr("disabled");
            },1000);
        }
    });
</script>

@endsection
