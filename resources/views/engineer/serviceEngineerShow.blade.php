@extends('layout.main')

@section('content')
<div id="complaint" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Service Engineer Details <a href="{{ route('list.serviceEngineer') }}" class="btn btn-info pull-right" > Back </a></h1>

            <div class="col-md-10">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> First Name </h4>
                        <span class="list-group-item-text">{{ $user->first_name }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Last Name </h4>
                        <span class="list-group-item-text">{{ $user->last_name }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Email Address </h4>
                        <span class="list-group-item-text">{{ $user->email }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> date of birth  </h4>
                        <span class="list-group-item-text">{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> gender  </h4>
                        <span class="list-group-item-text">{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> phone  </h4>
                        <span class="list-group-item-text">{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> city  </h4>
                        <span class="list-group-item-text">{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> state  </h4>
                        <span class="list-group-item-text">{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> country  </h4>
                        <span class="list-group-item-text">{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"> Status </h4>
                        <span class="list-group-item-text">
                            @if ( $user->status == 1 )
                                <span class="text-success"> Active </span>
                           @else
                                <span class="text-Danger"> In-Active </span>
                            @endif
                         </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
