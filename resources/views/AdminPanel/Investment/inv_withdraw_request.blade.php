@extends('layouts.dashboard')

@section('DashBoard')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <br>
      <br>
      @if (session('status'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <strong>Great! </strong> {{ session('status') }} </button>
        </div>
      @endif
      @if (session('warning'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <strong>Ops! </strong> {{ session('warning') }} </button>
        </div>
      @endif
      <div class="table-responsive">
        <h3>Pending Investment Withdraw Requests:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">User Id</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Account Type</th>
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Token Number</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($withdrawRequest as $value)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td class="text-center">{{ $value->user_id }}</td>
                    <td class="text-center">{{ $value->username }}</td>
                    <td class="text-center">$ {{ $value->amount }}</td>
                    <td class="text-center">{{ $value->accType }}</td>
                    <td class="text-center">{{ $value->AccNumber }}</td>
                    <td class="text-center">{{ $value->tokenNumber }}</td>
                    <td class="text-center">
                        <ul class="table-controls">
                            <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Approve{{ $loop->index+1 }}">Approve</a></li>
                            <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Cancel{{ $loop->index+1 }}">Denied</a></li>
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
                    <form class="from-control" action="{!! route('Investment-withdraw-request-approve') !!}#" method="post">
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

                <div class="modal fade" id="Cancel{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Denied this ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <form class="from-control" action="{!! route('Investment-withdraw-request-denied') !!}" method="post">
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

    <div class="col-md-12">
      <br>
      <br>
      <br>
      <br>
      <div class="table-responsive">
        <h3>Denied Investment Withdraw Requests:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">User Id</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Account Type</th>
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Token Number</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($withdrawRequestDenied as $value)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td class="text-center">{{ $value->user_id }}</td>
                    <td class="text-center">{{ $value->username }}</td>
                    <td class="text-center">$ {{ $value->amount }}</td>
                    <td class="text-center">{{ $value->accType }}</td>
                    <td class="text-center">{{ $value->AccNumber }}</td>
                    <td class="text-center">{{ $value->tokenNumber }}</td>
                    <td class="text-center">
                        <ul class="table-controls">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#undo{{ $loop->index+1 }}">Undo</a></li>
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#hardDelete{{ $loop->index+1 }}">Delete</a></li>
                        </ul>
                    </td>
                </tr>

                <div class="modal fade" id="undo{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you Undo this ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <form class="from-control" action="{!! route('Investment-withdraw-request-undo') !!}" method="post">
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

                <div class="modal fade" id="hardDelete{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Delete this ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <form class="from-control" action="{!! route('Investment-withdraw-request-delete') !!}" method="post">
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
    <div class="col-md-12">
      <br>
      <br>
      <br>
      <br>
      <div class="table-responsive">
        <h3>Approved Investment Withdraw Requests:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">User Id</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Account Type</th>
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Token Number</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($withdrawRequestApprove as $value)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td class="text-center">{{ $value->user_id }}</td>
                    <td class="text-center">{{ $value->username }}</td>
                    <td class="text-center">$ {{ $value->amount }}</td>
                    <td class="text-center">{{ $value->accType }}</td>
                    <td class="text-center">{{ $value->AccNumber }}</td>
                    <td class="text-center">{{ $value->tokenNumber }}</td>
                    <td class="text-center">
                        <ul class="table-controls">
                            <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Clear{{ $loop->index+1 }}">Clear</a></li>
                        </ul>
                    </td>
                </tr>

                <div class="modal fade" id="Clear{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Clear this ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <form class="from-control" action="{!! route('Investment-withdraw-request-delete') !!}" method="post">
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

  </div>
</div>
@endsection
