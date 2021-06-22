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
          <h3>Pending Investment Requests:</h3>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Package Name</th>
                      <th>Amount</th>
                      <th>Remaining Day</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($InvestHistory as $value)
                  @php
                    $InvestPakeInfo = DB::table('inv_package_controllers')->where('id', $value->package_id)->first();
                  @endphp
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $InvestPakeInfo->package_name }}</td>
                      <td>{{ $value->Amount }}</td>
                      <td>{{ $InvestPakeInfo->investment_period }}</td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Approve{{ $loop->index+1 }}">Approve</a></li>
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Cancel{{ $loop->index+1 }}">Pause</a></li>
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
                      <form class="from-control" action="{!! route('Investment-Request-From-User-approve') !!}" method="post">
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
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Pause this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Request-From-User-Cancel') !!}" method="post">
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
          <h3>Active Investment Requests:</h3>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Package Name</th>
                      <th>Amount</th>
                      <th>Remaining Day</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($InvestActive as $value)
                  @php
                    $InvestPakeInfo = DB::table('inv_package_controllers')->where('id', $value->package_id)->first();
                  @endphp
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $InvestPakeInfo->package_name }}</td>
                      <td>{{ $value->Amount }}</td>
                      <td>{{ $value->remaining_day }}</td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Deactive{{ $loop->index+1 }}">Deactive</a></li>
                          </ul>
                      </td>
                  </tr>

                  <div class="modal fade" id="Deactive{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Deactive this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Request-From-User-Cancel') !!}" method="post">
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
          <h3>Paused Investments:</h3>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Package Name</th>
                      <th>Amount</th>
                      <th>Remaining Day</th>
                      <th>User Id</th>
                      <th>Total Earn</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($InvestExpired as $value)
                  @php
                    $InvestPakeInfo = DB::table('inv_package_controllers')->where('id', $value->package_id)->first();
                  @endphp
                  <tr>
                      <td class="text-center">{{ $loop->index+1 }}</td>
                      <td>{{ $InvestPakeInfo->package_name }}</td>
                      <td>{{ $value->Amount }}</td>

                      @if ($value->remaining_day == 0)
                        <td><p style="color:green">Complete</p></td>
                      @endif
                      @if ($value->remaining_day != 0)
                        <td>{{ $value->remaining_day }}</td>
                      @endif
                      <td>{{ $value->user_id }}</td>
                      <td>
                        @php
                           echo $earn = DB::table('users')->where('id', $value->user_id)->value('total_earn');
                        @endphp
                        $
                      </td>
                      <td class="text-center">
                          <ul class="table-controls">
                              <li><a href="javascript:void(0);"   data-toggle="modal" data-target="#Undo{{ $loop->index+1 }}">Undo</a></li>
                          </ul>
                      </td>
                  </tr>

                  <div class="modal fade" id="Undo{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you wanna Undo this ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <form class="from-control" action="{!! route('Investment-Request-From-User-Undo') !!}" method="post">
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
