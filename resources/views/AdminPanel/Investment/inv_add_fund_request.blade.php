@extends('layouts.dashboard')

@section('DashBoard')

  <div class="container">
    <div class="row">

      {{-- Pending Table Start --}}
      <div class="col-md-12">
        <br>
        <br>
        <br>
        <br>
        @if (session('status'))
          <div class="alert alert-success mb-4" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
              <strong>Great! </strong> {{ session('status') }} </button>
          </div>
        @endif
        <div class="table-responsive">
          <h3>Pending Add Fund Requests:</h3>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Phone Number</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Trx ID</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($PendingInvoiceOfAddFund as $value)
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $value->phoneNumber }}</td>
                      <td>{{ $value->Amount }}</td>
                      <td>{{ $value->PaymentMethod }}</td>
                      <td>{{ $value->trxId }}</td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Approve{{ $loop->index+1 }}">Approve</a></li>
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Cancel{{ $loop->index+1 }}">Cancel</a></li>
                          </ul>
                      </td>
                  </tr>

                  <div class="modal fade" id="Approve{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna approve this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Approve-Add-Fund-Request') !!}" method="post">
                        @csrf
                            <input type="text" hidden class="form-control" name="request_id" value="{{ $value->id }}">
                            <input type="text" hidden class="form-control" name="user_id" value="{{ $value->user_id }}">
                            <input type="text" hidden class="form-control" name="Amount" value="{{ $value->Amount }}">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="Cancel{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Cancel this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Cancel-Add-Fund-Request') !!}" method="post">
                        @csrf
                            <input type="text" hidden class="form-control" name="request_id" value="{{ $value->id }}">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>

                  @endforeach
              </tbody>
          </table>
      </div>
      </div>
      {{-- Pending Table End --}}


      {{-- Approved Table Start --}}
      <div class="col-md-12">
        <br>
        <br>
        <br>
        <br>
        <div class="table-responsive">
          <h3>Approved Add Fund Requests:</h3>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Phone Number</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Trx ID</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($ApprovedInvoiceOfAddFund as $value)
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $value->phoneNumber }}</td>
                      <td>{{ $value->Amount }}</td>
                      <td>{{ $value->PaymentMethod }}</td>
                      <td>{{ $value->trxId }}</td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#DeleteFromApproved{{ $loop->index+1 }}">Delete</a></li>
                          </ul>
                      </td>
                  </tr>

                  <div class="modal fade" id="DeleteFromApproved{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Delete this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Delete-Add-Fund-Request') !!}" method="post">
                        @csrf
                            <input type="text" hidden class="form-control" name="request_id" value="{{ $value->id }}">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </tbody>
          </table>
      </div>
      </div>
      {{-- Approved Table End --}}


      {{-- Cancel Table Start--}}
      <div class="col-md-12">
        <br>
        <br>
        <br>
        <br>
        <div class="table-responsive">
          <h3>Canceled Add Fund Requests:</h3>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Phone Number</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Trx ID</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($CanceledInvoiceOfAddFund as $value)
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $value->phoneNumber }}</td>
                      <td>{{ $value->Amount }}</td>
                      <td>{{ $value->PaymentMethod }}</td>
                      <td>{{ $value->trxId }}</td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#DeleteFromCancel{{ $loop->index+1 }}">Delete</a></li>
                          </ul>
                      </td>
                  </tr>

                  <div class="modal fade" id="DeleteFromCancel{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Delete this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Delete-Add-Fund-Request') !!}" method="post">
                        @csrf
                            <input type="text" hidden class="form-control" name="request_id" value="{{ $value->id }}">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </tbody>
          </table>
      </div>
      </div>
      {{-- Cancel Table End --}}
    </div>
  </div>
@endsection
