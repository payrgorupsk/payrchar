@extends('layouts.app')
@section('custom_css')
<style>
    .uil-image, .uil-video {
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
                    @if(!empty($userProfile->profile_image) && file_exists('public/uploads/'.$userProfile->profile_image))
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
                        <h6>Current balance: <span>$</span><span>{{ $totalBalance }}</span></h6>
                    </div>
                </div>
            </div>
            <!-- column two -->
                <div class="uk-card-default px-5 py-4">
                    <div class="mb-4 uk-text-center">
                        <h4 class="mb-0">Withdraw your Balance</h4>
                    </div>

                <form class="uk-child-width-1-1 uk-grid-small" uk-grid>

                    <div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">Select Withdraw Method</label>

                            <div class="uk-position-relative w-100">
                                <select class="uk-select">
                                    <option>Paypal</option>
                                    <option>Bkash</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="uk-width-1-2@s">
                        <div class="uk-form-group">
                            <label class="uk-form-label"> Email</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-mail"></i>
                                </span>
                                <input class="uk-input" type="email" placeholder="name@example.com">
                            </div>

                        </div>
                    </div>
                    <div class="uk-width-1-2@s">
                        <div class="uk-form-group">
                            <label class="uk-form-label"> Amount</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-dollar-sign"></i>
                                </span>
                                <input class="uk-input" type="text" placeholder="
                                0.00">
                            </div>

                        </div>
                    </div>

                    <div>
                        <div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>
                            <div class="uk-width-auto@s">
                                <input type="submit" class="button primary" value="Request Withdraw"></input>
                            </div>
                        </div>
                    </div>

                </form>
            </div><!--  End column two -->

    </div>
</div>
@endsection

@section('custom_js')


@endsection