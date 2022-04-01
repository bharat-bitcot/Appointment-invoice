@extends('layout.main')

@section('content')
<div id="complaint" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Complaint Details
                @if ( $role_id == 3 )
                    @if( isset( $service_engineer_lists ) &&  $service_engineer_lists != '' )
                    <button type="button" class="btn btn-danger btn-lg pull-right" data-toggle="modal" data-target="#AssignServiceEngineerModel" > Assign Service Engineer </button>
                    @endif
                @endif

                @if ( $role_id == 4 )

                    <a href="{{ route('create.invoice', $complaint->id ) }}" class="btn btn-danger btn-lg pull-right" > Create Invoice </a>
                @endif

                <a href="{{ route('dashboard') }}" class="btn btn-info btn-lg pull-right" > Back </a>
            </h1>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                @endif

                @if (Session::has('failure'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p>{{ Session::get('failure') }}</p>
                    </div>
                @endif


            <div class="col-md-10">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Name </h4>
                        <span class="list-group-item-text">{{ $complaint->title }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Description </h4>
                        <span class="list-group-item-text">{{ $complaint->description }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Product Condition </h4>
                        <span class="list-group-item-text">{{ ( $complaint->condition_type == 1 ) ? 'New' : 'Old' ; }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Complaints </h4>
                        <span class="list-group-item-text">
                            @if ( $complaint->status == 2 )
                                <span class="text-success"> Completed </span>
                            @elseif ( $complaint->status == 1 )
                                <span class="text-danger"> In Progress </span>
                            @else
                                <span class="text-info"> Pending </span>
                            @endif
                         </span>
                    </li>
                </ul>
            </div>

            @if( $is_assign_service_engineer )
            <div class="col-md-10">
                <h2> Assigned Engineer </h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Name </h4>
                        <span class="list-group-item-text">
                            {{ isset( $is_assign_service_engineer->user->first_name ) ? $is_assign_service_engineer->user->first_name : ''  }}
                            {{ isset( $is_assign_service_engineer->user->last_name ) ? $is_assign_service_engineer->user->last_name : ''  }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Email </h4>
                        <span class="list-group-item-text">
                            {{ isset( $is_assign_service_engineer->user->email ) ? $is_assign_service_engineer->user->email : '----'  }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Phone no. </h4>
                        <span class="list-group-item-text">
                            {{ isset( $is_assign_service_engineer->user->phone ) ? $is_assign_service_engineer->user->phone : '----'  }}
                        </span>
                    </li>
                    @if ( $role_id == 4 && $complaint->status == 0 )
                        <li class="list-group-item">
                            <h4 class="list-group-item-heading"> Action </h4>
                            <span class="list-group-item-text">
                                <a href="{{ route('inprogress.complaint', $complaint->id ) }}" class="btn btn-primary"> Mark as In-Progress </a>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
            @endif

            <?php
               // dd( $invoices );
            ?>
            @if( $invoices )
                <div class="col-md-10">
                    <h2> Invoice Lists </h2>
                    <ul class="list-group">
                        @foreach ($invoices as  $invoice)
                            <li class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    {{ $invoice->address }}
                                    <a href="{{ route('generate.invoice', [ 'id' => $invoice->id ] ) }} " class="btn btn-primary pull-right">View </a>
                                </h4>
                                <h4 class="list-group-item-heading">
                                    {{ $invoice->phoneno }}
                                </h4>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
@if( isset( $service_engineer_lists ) &&  $service_engineer_lists != '' && $role_id == 3 )


<div class="modal fade" id="AssignServiceEngineerModel" role="dialog">
    <div class="modal-dialog" style="margin-top:8%;">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Assign Service Engineer </h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['route'=>['assign.complaint', $complaint->id ], 'method' => 'PUT', 'class'=> 'form-horizontal registerForm', 'id'=>'registerForm' ]) !!}
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                    {!! Form::label('service_engineer', 'Choose Service Engineer', [ 'class' => 'control-label' , 'for' => "service_engineer" ] ); !!}
                    </div>
                    <div class="col-sm-12">
                        {!! Form::select('service_engineer',  $service_engineer_lists, null, ['class' => 'form-control','id' => 'service_engineer','required' => 'required' ]) !!}
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger  btn-lg">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>

        </div>

    </div>
</div>
@endif



@endsection
