@extends('layouts.dashboard')

@section('DashBoard')
<div id="content" class="main-content">
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 layout-spacing ml-4">
        <div class="widget widget-table-two">
            <br><br>
            <div class="widget-heading">
                <h5 class="">User Details</h5>
            </div>
            <hr>
            <form action="{{ url('/update-user', $user->id) }}" method="POST">
                @csrf
                <div class="form-group row mb-4">
                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">First Name</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Last Name</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Email</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Phone</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Password</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" name="confirm_password">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Status</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <select name="status" class="form-control">
                            <option value="1" {{ $user->status == 1 ? 'selected' : ''}}>Active</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </div>
            </form>
            <div class="widget-content">
            </div>
        </div>
    </div>
</div>
@endsection