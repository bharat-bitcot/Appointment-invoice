@extends('layout.main')

@section('content')
<div id="complaint" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Complaint Details

                <a href="{{ route('dashboard') }}" class="btn btn-danger pull-right" > Assign Service Engineer </a>
                <a href="{{ route('dashboard') }}" class="btn btn-info pull-right" > Back </a>
            </h1>

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
        </div>
    </div>
</div>
@endsection
