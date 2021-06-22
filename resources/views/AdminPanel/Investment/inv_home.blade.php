@extends('layouts.dashboard')

@section('DashBoard')

  <div class="container">
    <div class="row">
      
      <div class="col-md-12">
        <br>
        <br>
        <br>
        <br>
        <button class="btn btn-danger mb-2 mr-2 btn-rounded" data-toggle="modal" data-target="#exampleModalCenterAddNew">Add New Package <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Package Name</th>
                      <th>Investment Period</th>
                      <th>Minimum Invest</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($packages as $value)
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $value->package_name }}</td>
                      <td>{{ $value->investment_period }}</td>
                      <td><p class="text-danger">{{ $value->min_invest }} USD</p></td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#exampleModalCenter{{ $loop->index+1 }}">Edit</a></li>
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#exampleModalCenterDelete{{ $loop->index+1 }}">Delete</a></li>
                          </ul>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          @if (session('status'))
            <div class="alert alert-success mb-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                <strong>Congo! </strong> {{ session('status') }} </button>
            </div>
          @endif
      </div>
      </div>
    </div>
  </div>

{{-- Add New Package Start --}}

<div class="modal fade" id="exampleModalCenterAddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Package:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="from-control" action="{!! route('investment-Create-New-Package') !!}" method="post">
      @csrf
      <div class="modal-body">
           <p>Package Name:</p>
          <input type="text" class="form-control" required name="package_name" >
           <p>Investment Period</p>
          <input type="text" class="form-control" required name="investment_period">
           <p> Minimum Investment Ammount: </p>
          <input type="text" class="form-control" required name="min_invest" >
           <p> Maximum Investment Ammount: </p>
          <input type="text" class="form-control" required name="max_invest">
           <p>Daily Interest (%):</p>
          <input type="text" class="form-control" required name="daily_interest">
          <p>Interval Day:</p>
          <input type="text" class="form-control" required name="interval_day">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add New Package</button>
      </div>
    </form>
    </div>
  </div>
</div>


{{-- Add New Package End --}}


{{-- Modals  --}}
@foreach ($packages as $value)

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">{{ $value->package_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form class="from-control" action="{!! route('investment-update-package') !!}" method="post">
        @csrf
        <div class="modal-body">

             <p>Package Name:</p>
            <input type="text" class="form-control" name="package_name" value="{{ $value->package_name }}">
             <p>Investment Period</p>
            <input type="text" class="form-control" name="investment_period" value="{{ $value->investment_period }}">
             <p> Minimum Investment Ammount: </p>
            <input type="text" class="form-control" name="min_invest" value="{{ $value->min_invest }}">
             <p> Maximum Investment Ammount: </p>
            <input type="text" class="form-control" name="max_invest" value="{{ $value->max_invest }}">
             <p>Daily Interest:</p>
            <input type="text" class="form-control" name="daily_interest" value="{{ $value->daily_interest }}">
            <p>Interval Day:</p>
            <input type="text" class="form-control" name="interval_day" value="{{ $value->interval_day }}">
            <input type="text" hidden class="form-control" name="package_id" value="{{ $value->id }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenterDelete{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna delete this?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form class="from-control" action="{!! route('investment-delete-Package') !!}" method="post">
        @csrf
            <input type="text" hidden class="form-control" name="package_id" value="{{ $value->id }}">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete Now</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endforeach
@endsection
